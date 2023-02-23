<?php
/**
 * Class Responsável por povoar a template com as views
 * @copyright Felipe Oliveira Lourenço 08.01.2021
 * @version 1.0.0
 */

namespace Template;

class Fill/*extends AnotherClass/*/
{
    private $file; // Caminho do arquivo para povoar
    private $tpl; // Guarda o HTML do arquivo passado
    private $ext; // Extensões permitidas. Deve se no formato array
    private $before; // Guarda a parte HTML before
    private $content; // Guarda a parte HTML do conteudo
    private $after; // Guarda a parte HTML after
    private $message = []; // Retorna as messagens de erros
	
	private $node; // Indica o nó que deseja povoar

    public function __construct(string $file = null, array $ext = ['tpl', 'html'])
    {
        $this->file = (isset($file)) ? $file : array_push($this->message, '1º parametro não foi setado');
        $this->ext = $ext;
        $this->tpl = ($this->check()) ? file_get_contents($this->file) : array_push($this->message, 'Não existe HTML');
    }

    /**
     * Prepara o saída para ser utilizada
     * @return [type] [description]
     */
    public function output()
    {
        $this->mount($this->tpl);
        return [
            'BEFORE' => $this->before,
            'CONTENT' => $this->content,
            'AFTER' => $this->after,
            'MESSAGE' => $this->message,
        ];
    }

    /**
     * Povoa Template HTML com os mesmos nomes das colunas do banco de dados excelente para MVC
     * @param  [type]  $tpl             [description]
     * @param  string  $dataTableFields [description]
     * @param  string  $extraFields     [description]
     * @param  boolean $return          [description]
     * @return [type]                   [description]
     */
    public function _fill($tpl, $dataTableFields = '', $extraFields = '', $return = true)
    {
        if (file_exists($tpl)) {
            $tpl = file_get_contents($tpl);
        } else {
            $tpl = $tpl;
        }

        if ($dataTableFields != '' and $extraFields != '') {
            $Data[0] = $dataTableFields = array_merge($dataTableFields, $extraFields);

        } elseif ($dataTableFields != '' and $extraFields == '') {
            $Data[0] = $dataTableFields;
        } else {
            $Data[0] = $extraFields;
        }

        foreach ($Data as $values) {
            extract($values);
            $links = "#" . implode("#&#", array_keys($values)) . "#";
            $links = explode('&', $links);
            $links = str_replace($links, array_values($values), $tpl);
        }

        if ($return == true) {
            echo $links;
        } else {
            return $links;
        }
    }

	/**
	 * Permite e leitura de codigo PHP direto na TPL
	 */
    public function php()
    {
        $before = (string) '\%\{';
        $after = (string) '\}\%';
        $string = trim(str_replace(["\n", "\t"], "", $this->tpl));
        preg_match_all('/' . $before . '(.*?)' . $after . '/', $string, $Element);

		if($Element[1][0]){
			@eval($Element[1][0]);
		}
    }


	/**
	 * Retorna o Conteúdo da fatio (Slice ou Node)
	 */
	public function contentNode($slice)
	{
		if(isset($slice)){
			$before = (string) '\[' . $slice . '\]';
            $after = (string) '\[\/' . $slice . '\]';
            $string = trim(str_replace(["\n", "\t"], "", $this->tpl));
            preg_match_all('/' . $before . '(.*?)' . $after . '/', $string, $Element);
			if(!empty($Element[1][0])){
				return $Element[1][0];
			}
		}
		return false;
	}


	/**
	 * Captura a sobra do código e prepara para a montagem
	 */
	public function over()
	{
		$before = (string) '\%\{';
		$after = (string) '\}\%';
		$string = trim(str_replace(["\n", "\t"], "", $this->tpl));
		preg_match_all('/' . $before . '(.*?)' . $after . '/', $string, $Element);
		
		// if (!isset($Element[1][1])) {
			if (isset($Element[0][0])) {
				$tags = explode($Element[0][0], $string, 3);
				$this->before = $tags[0];
				$this->content = $Element[1][0];
				$this->after = $tags[1];
			} else {
				$this->before = '';
				$this->content = '';
				$this->after = '';
			}
		// }
		return [
			$this->before,
			$this->content,
			$this->after
		];
	}


	/**
	 * Retorna o conteúdo do nó passado pelo parametro,
	 * caso contrario retorna todos os nós
	 */
	public function loop($n=null)
	{
		$before = (string) '\%\{';
		$after = (string) '\}\%';
		$string = trim(str_replace(["\n", "\t"], "", $this->tpl));
		preg_match_all('/' . $before . '(.*?)' . $after . '/', $string, $Element);
		$Output = null;
		if(count($Element[1]) > 1){
			$i = 0;
			foreach ($Element[1] as $item) {
				$Node[$i] = explode(";",$item)[0];
				$Content[$i] = str_replace( $Node[$i].";", "", $item);
				$Node[$i] = explode("=",$Node[$i])[1];
				if(isset($n) && $Node[$i] == $n){
					$this->node = $Content[$i];
					return $Content[$i];
				}else{
					$Output[$i] = [
						'node' => $Node[$i],
						'content' => $Content[$i]
					];
				}
				$i++;
			}
		}
		$this->node = $Output;
		return $Output;
	}

	/**
	 * Povao o shortcode com os dados passados
	 */
	public function shortcode()
	{
		return false;
	}


	public function render()
	{
		return false;
	}

    /**
     * Quebra a TPL pelos nós e separa em um array com 3 partes
     * @param  string  $node   [description]
     * @param  boolean $output [description]
     */
    public function mount($el)
    {
        if ($this->check()) {
            $before = (string) '\[' . $el . '\]';
            $after = (string) '\[\/' . $el . '\]';
            $string = trim(str_replace(["\n", "\t"], "", $this->tpl));
            preg_match_all('/' . $before . '(.*?)' . $after . '/', $string, $Element);
            if (!isset($Element[1][1])) {
                if (isset($Element[0][0])) {
                    $tags = explode($Element[0][0], $string, 3);
                    $this->before = $tags[0];
                    $this->content = $Element[1][0];
                    $this->after = $tags[1];
                } else {
                    $this->before = '';
                    $this->content = '';
                    $this->after = '';
                    array_push($this->message, 'Nenhum nó encontrado');
                }
            }
        }
    }

	    /**
     * Retorna os detalhes do arquivo para saber se é compativel
     */
    private function infos()
    {
        return pathinfo($this->file);
    }

    /**
     * Checa se a extensão do arquivo passado corresponde
     * e checa se o arquivo existe
     */
    private function check()
    {
        if (file_exists($this->file)) {
            if (in_array($this->infos()['extension'], $this->ext)) {
                return true;
            }
        }
        return false;
    }
}
