<link rel="stylesheet" href="./assets/css/croppie.css" />
<style>
.profile-editor input[type='file'] { display: none }
.profile-editor label {  cursor: pointer; margin-top: 20px; }
</style>
<script src="../jquery/jquery-3.4.0.min.js"></script>
<script src="./assets/js/croppie.js"></script>



<div class="row profile-editor">
  <div class="col-md-12 text-center">
    <div id="uploaded_image">
		<img src="./default.jpg" alt="Default"> 
    </div>
    <label for="upload_image" class="btn btn-primary">Editar Imagem</label>
    <input type="file" id="upload_image" class="form-control" />
  </div>
</div>


<div id="uploadimageModal" class="modal" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
      		<div class="modal-header">
        			<h4 class="modal-title">Editando Perfil</h4>
      		</div>
      		<div class="modal-body">
        		<div class="row">
  					<div class="col-md-12 text-center">
						  <div id="image_demo" style="width:350px; margin-top:30px"></div>
  					</div>
  					
                   <div class="col-md-12">
						  <button class="btn btn-primary crop_image">Enviar</button>
					  </div>

				</div>
      		</div>
      		<div class="modal-footer">
        		<button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
      		</div>
    	</div>
    </div>
</div>

<script src="./assets/js/croppie-custom.js"></script>
