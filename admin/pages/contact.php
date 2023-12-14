<?php

// Pins.
$option__pin_curriculum = get_option( 'cndev__contact_pin_curriculum' );
$option__pin_email      = get_option( 'cndev__contact_pin_email' );
$option__pin_whatsapp   = get_option( 'cndev__contact_pin_whatsapp' );

// Form.
$option__form_selector = get_option( 'cndev__contact_form_selector' );
$available_forms       = cndev__available_forms();

?>

<div class="cndev__contact-panel">
	<div class="heading">
		<h1>Contato</h1>
	</div>
	<div class="content">
		<form method="post">
			<input type="hidden" name="cndev__contact_update" value="true">
			<div class="form-item">
				<label for="cndev__contact_pin_curriculum">Curriculum Vitae</label>
				<input type="text" name="cndev__contact_pin_curriculum" id="cndev__contact_pin_curriculum" value="<?php echo esc_attr( $option__pin_curriculum ); ?>">
			</div>
			<div class="form-item">
				<label for="cndev__contact_pin_email">E-mail</label>
				<input type="text" name="cndev__contact_pin_email" id="cndev__contact_pin_email" value="<?php echo esc_attr( $option__pin_email ); ?>">
			</div>
			<div class="form-item">
				<label for="cndev__contact_pin_whatsapp">Whatsapp</label>
				<input type="text" name="cndev__contact_pin_whatsapp" id="cndev__contact_pin_whatsapp" value="<?php echo esc_attr( $option__pin_whatsapp ); ?>">
			</div>
			<div class="form-item">
				<label for="cndev__contact_form_selector">Form</label>
				<select name="cndev__contact_form_selector" id="cndev__contact_form_selector">
					<?php

					foreach ( $available_forms as $form_id => $form_title ) {
						$selected = strval( $form_id ) === $option__form_selector ? ' selected' : '';
						echo 'default' === $form_id ? '<option value="" disabled selected>' . $form_title . '</option>' : '<option value="' . $form_id . '"' . $selected . '>' . $form_title . '</option>';
					}

					?>
				</select>
			</div>
			<div class="form-item submit">
				<input type="submit" value="Salvar">
			</div>
		</form>
	</div>
</div>
