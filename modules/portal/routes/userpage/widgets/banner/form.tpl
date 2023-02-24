<div id="app"></div>

<form class="ui form">
   
    <h4 class="ui dividing header">Configurações</h4>

    <!-- Animação -->
    <div class="field">
        <label>Animação</label>
        <select class="ui fluid dropdown">
            <option value="">State</option>
            <option value="fade">Fade (Esmaecer)</option>
            <option value="slide">Slide (Deslizante)</option>
            <option value="scale">Scale (Escala)</option>
            <option value="pull">Pull (Empurrar)</option>
            <option value="push">Push (Puxar)</option>
        </select>
    </div>

    <!-- Alturas -->
    <div class="field">
        <label>Alturas mínima e máxima dos banners</label>
        <div class="two fields">
            <div class="field">
                <input type="text" name="min_heigth" placeholder="Altura mínima" value="300">
            </div>
            <div class="field">
                <input type="text" name="max_height" placeholder="Altura máxima" value="600">
            </div>
        </div>
    </div>

    <!-- Autoplay -->
    <div class="ui segment">
        <div class="field">
            <div class="ui toggle checkbox">
                <label>Autoplay</label>
                <input type="checkbox" name="autoplay" tabindex="0" class="hidden">
            </div>
        </div>
    </div>

    <!-- Efeitos -->
    <div class="ui segment">
        <div class="field">
            <div class="ui toggle checkbox">
                <label>Efeito visual no slide</label>
                <input type="checkbox" name="kenburns" tabindex="0" class="hidden">
            </div>
        </div>
    </div>

    <!-- Setas -->
    <div class="ui segment">
        <div class="field">
            <div class="ui toggle checkbox">
                <label>Navegação por setas</label>
                <input type="checkbox" name="kenburns" tabindex="0" class="hidden">
            </div>
        </div>
    </div>

    <!-- Setas -->
    <div class="ui segment">
        <div class="field">
            <div class="ui toggle checkbox">
                <label>Navegação dotnav</label>
                <input type="checkbox" name="kenburns" tabindex="0" class="hidden">
            </div>
        </div>
    </div>
    
    <div class="ui button" tabindex="0">Submit Order</div>
</form>