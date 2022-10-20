<?php
/**
 * Template part for displaying formulaire de l'appel à projet
 *
 *
 * @package museolab
 */

?>
	
	<div id="form_container">
	
		<form id="form_22279" class="appnitro"  method="post" action="">
					<div class="form_description">
			<h2>AAP museolab</h2>
			<p>Pour proposer vos projets au museolab, merci de bien compléter ce formulaire</p>
		</div>						
			<ul >
			
					<li id="li_1" >
		<label class="description" for="element_1">Nom </label>
		<span>
			<input id="element_1_1" name= "element_1_1" class="element text" maxlength="255" size="8" value=""/>
			<label>Prénom</label>
		</span>
		<span>
			<input id="element_1_2" name= "element_1_2" class="element text" maxlength="255" size="14" value=""/>
			<label>Nom</label>
		</span> 
		</li>		<li id="li_7" >
		<label class="description" for="element_7">Type de structure </label>
		<div>
		<select class="element select medium" id="element_7" name="element_7"> 
			<option value="1" >Association</option>
<option value="2" selected="selected">Particulier</option>
<option value="3" >Entreprise</option>
<option value="4" >Institution</option>

		</select>
		</div> 
		</li>		<li id="li_2" >
		<label class="description" for="element_2">Email </label>
		<div>
			<input id="element_2" name="element_2" class="element text medium" type="text" maxlength="255" value=""/> 
		</div> 
		</li>		<li id="li_6" >
		<label class="description" for="element_6">Nom de la structure </label>
		<div>
			<input id="element_6" name="element_6" class="element text medium" type="text" maxlength="255" value=""/> 
		</div> 
		</li>		<li id="li_5" >
		<label class="description" for="element_5">Phone </label>
		<span>
			<input id="element_5_1" name="element_5_1" class="element text" size="3" maxlength="3" value="" type="text"> -
			<label for="element_5_1">(###)</label>
		</span>
		<span>
			<input id="element_5_2" name="element_5_2" class="element text" size="3" maxlength="3" value="" type="text"> -
			<label for="element_5_2">###</label>
		</span>
		<span>
	 		<input id="element_5_3" name="element_5_3" class="element text" size="4" maxlength="4" value="" type="text">
			<label for="element_5_3">####</label>
		</span>
		 
		</li>		<li id="li_3" >
		<label class="description" for="element_3">Web Site </label>
		<div>
			<input id="element_3" name="element_3" class="element text medium" type="text" maxlength="255" value="http://"/> 
		</div> 
		</li>		<li id="li_4" >
		<label class="description" for="element_4">Description du projet </label>
		<div>
			<textarea id="element_4" name="element_4" class="element textarea medium"></textarea> 
		</div> 
		</li>
			
					<li class="buttons">
			    <input type="hidden" name="form_id" value="22279" />
			    
				<input id="saveForm" class="button_text" type="submit" name="submit" value="Submit" />
		</li>
			</ul>
		</form>	

	</div>
	
