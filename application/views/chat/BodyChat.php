<i class='fas fa-comment open-button' style="font-size:48px;color:#dc3545" onclick="openForm()"></i>

<div class="chat-popup form-container container p-3" id="myForm">
	<div class="row">
		<h4 class="col-11">Messenger</h4>
		<i class=" col-1 fa fa-times" onclick="closeForm()"  style="font-size:16px;color:#dc3545"></i>
	</div>

	<div class="row pb-2 mb-2 pt-2 mt-2 showChat" style="overflow-y: scroll;">
		<div class="col-12">
			<? $showChat ?>


			<div class="row mb-2 pb-3">
				<div class="col-2"></div>
				<div class="col-10 rounded border border-secondary">
					<label>Você:</label>
					<p class="text-justify text-chat">
						Mas está em bom estado? é que na foto parece aranhado sabe. ai fiquei com duvida
					</p>
				</div>
			</div>

			<div class="row mb-2 pb-3">
				<div class="col-10 rounded border border-secondary" >
					<label>Ela(e):</label>
					<p class="text-justify text-chat">
						Tem esse aranhado na fita mas ele funciona perfeitamente, isso foi meu dog quem fez Oo. Para ele tudo é comida
					</p>
				</div>
				<div class="col-2"></div>
			</div>


			<div class="row mb-2 pb-3">
				<div class="col-2 bl-10"></div>
				<div class="col-10 rounded border border-secondary">
					<label>Você:</label>
					<p class="text-justify text-chat">
						A tudo bem vou fechar a compra então XD.
					</p>
				</div>
			</div>

			<div class="row mb-2 pb-3">
				<div class="col-10 rounded border border-secondary" >
					<label>Ela(e):</label>
					<p class="text-justify text-chat">
						blz vou separa o jogo para voce então....
					</p>
				</div>
				<div class="col-2"></div>
			</div>
			
			<div class="row mb-2 pb-3">
				<div class="col-10 rounded border border-secondary" >
					<label>Ela(e):</label>
					<p class="text-justify text-chat">
						Espero que goste, fez parte da minha infância...
					</p>
				</div>
				<div class="col-2"></div>
			</div>	

		</div>
	</div>

	<form action="#" class="row">

		<textarea class="col-9 rounded border border-danger" placeholder="Type message.." name="msg" required></textarea>

		<div class="ml-2 pl-2"></div>

		<button type="submit" class=" col-2 btn bg-success">
			<i class="fa fa-paper-plane" style="font-size:12px;"></i>
		</button>		


	</form>
</div>