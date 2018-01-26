<?php

//initilize the page
require_once("inc/init.php");



$db = new \Oracle\Db("Definição utilizador", "PTE");
$sql = "SELECT UTILIZADOR,  PASSWORD,  NOME,  EMAIL,  TLMV,  PEDE_PWD,  LANG,  FORMAT_MASK,  SEP_DECIMAL,  SEP_MIL FROM web_utilizadores WHERE UTILIZADOR=:nome ";
$user = 'pedro.estacio';
$res = $db->execFetchAll($sql, "Utilizador", array(array(":nome",$user,-1)));
foreach ($res as $row);

?>
		<section id="widget-grid" class="">
			
			<?php
				$ui = new SmartUI;
				$ui->start_track();
				
				$data = json_decode(file_get_contents(APP_URL.'/data/data.json'));

				// SmartForm layout
#                                <img src="img/avatars/sunny-big.png">
				
				$fields = array(
					'user' => array(
						'type' => 'input', // or FormField::FORM_FIELD_INPUT
						'col' => 5,
						'properties' => array(
                                                        'label' => $ui_user,
							'placeholder' => $ui_user,
                                                        'value' => $row['UTILIZADOR'],
#'tooltip' => 'Input name',
#'note' => '<strong>Note:</strong> Type in something to autocomplete',
#'autocomplete' => array(
#        'data' => $data,
#        'display' => 'Name',
#        'value' => 'Name'
#),
							'icon' => 'fa-user',
							'icon_append' => false
						)
					),
					'password' => array(
						'type' => 'input', // or FormField::FORM_FIELD_INPUT
						'col' => 5,
						'properties' => array(
                                                        'label' => $ui_password,
							'placeholder' => $ui_password,
                                                        'value' => $row['PASSWORD'],
#'tooltip' => 'Input name',
#'note' => '<strong>Note:</strong> Type in something to autocomplete',
#'autocomplete' => array(
#        'data' => $data,
#        'display' => 'Name',
#        'value' => 'Name'
#),
							'icon' => 'fa-user',
							'icon_append' => false
						)
					),
					'pwd_req' => array(
						'type' => 'checkbox',
						'properties' => array(
                                                        'items' => array(
                                                            array(  
                                                                    'label' => 'Sim',
                                                                    'value' => 'S',
                                                                    'checked' => true,
                                                                'id' => '1'
                                                             ),
                                                            array(  
                                                                    'label' => 'Não',
                                                                    'value' => 'N',
                                                                    'checked' => false,
                                                                'id' => '1'
                                                             ),
                                                        ),
							'label' => $ui_password_request,
							'inline' => true
						)
					),
    
                                    
                                        'name' => array(
						'type' => 'input',
						'col' => 6,
						'properties' => array(
							'label' => $ui_name,
                                                        'value' => $row['NOME'],
							'placeholder' => $ui_name,
							'icon' => 'fa-user',
							'icon_append' => false
						)
					),
					'email' => array(
						'type' => 'input',
						'col' => 6,
						'properties' => array(
							'label' => $ui_email,
							'placeholder' => $ui_email,
                                                        'value' => $row['EMAIL'],
							'icon' => 'fa-envelope',
							'type' => 'email',
							'icon_append' => false
						)
					),
					'phone' => array(
						'type' => 'input',
						'col' => 6,
						'properties' => array(
							'label' => $ui_phone,
							'placeholder' => $ui_phone,
                                                        'value' => $row['TLMV'],
							'icon' => 'fa-phone',
							'icon_append' => false
						)
					),
					'dt_nasc' => array(
						'type' => 'input',
						'col' => 2,
						'properties' => array(
                                                        'label' => $ui_default_lang,
                                                        'placeholder' => $ui_default_lang,
                                                        'type' => 'date',
                                                        'class' => 'datepicker',
							'icon' => 'fa-calendar',
							'icon_append' => false
						)
					),
					'lang' => array(
						'type' => 'select',
						'col' => 2,
						'properties' => array(
                                                        'label' => $ui_default_lang,
                                                        'placeholder' => $ui_default_lang,
							'data' => array(
                                                                    array('lang' => $ui_lang_us),
                                                                    array('lang' => $ui_lang_fr),
                                                                    array('lang' => $ui_lang_es),
                                                                    array('lang' => $ui_lang_de),
                                                                    array('lang' => $ui_lang_jp),
                                                                    array('lang' => $ui_lang_cn),
                                                                    array('lang' => $ui_lang_it),
                                                                    array('lang' => $ui_lang_pt),
                                                                    array('lang' => $ui_lang_ru),
                                                                    array('lang' => $ui_lang_kr)
							)
						)
					),
					'date_mask' => array(
						'type' => 'select',
						'col' => 2,
						'properties' => array(
                                                        'label' => $ui_date_format,
                                                        'placeholder' => $ui_date_format,
                                                        'data' => array(
                                                            array('date_mask' => 'YYYY-MM-DD'),
                                                            array('date_mask' => 'YYYY.MM.DD'),
                                                            array('date_mask' => 'DD-MM-YYYY'),
                                                            array('date_mask' => 'DD.MM.YYYY'),
                                                            array('date_mask' => 'MM-DD-YYYY'),
                                                            array('date_mask' => 'MM.DD.YYYY')
                                                        )
                                                            
						)
					),
					'decimal_sign' => array(
						'type' => 'select',
						'col' => 1,
						'properties' => array(
                                                        'label' => $ui_decimal_sign,
                                                        'placeholder' => $ui_decimal_sign,
                                                        'value' => '.',
                                                        'data' => array(
                                                            array('decimal_sign' => '.'),
                                                            array('decimal_sign' => ',')
                                                        )
						)
					),
					'thousand_sign' => array(
						'type' => 'select',
						'col' => 1,
						'properties' => array(
                                                        'label' => $ui_thousand_sign,
                                                        'placeholder' => $ui_thousand_sign,
                                                        'value' => '.',
                                                        'data' => array(
                                                            array('thousand_sign' => ','),
                                                            array('thousand_sign' => '.')
                                                        )
						)
					)
				);

				$form = $ui->create_smartform($fields);
				$form->fieldset(0, array('user','password','pwd_req'));
				$form->fieldset(1, array('name', 'email', 'phone','dt_nasc'));
				$form->fieldset(2, array('lang','date_mask','decimal_sign','thousand_sign'));

				$form->header('Informação do Utilizador');
				$form->footer(function($this) use ($ui) {
					return $ui->create_button('Gravar', 'primary')->attr(array('type' => 'submit','id' => 'gravar'))->print_html(true);
				});

				$form->title('<h2>Auto Layout</h2>');
				$result = $form->print_html(true);
				echo $result;


			?>

		</section>

<script type="text/javascript">
	
	/* DO NOT REMOVE : GLOBAL FUNCTIONS!
	 *
	 * pageSetUp(); WILL CALL THE FOLLOWING FUNCTIONS
	 * 
	 * // activate tooltips
	 * $("[rel=tooltip]").tooltip();
	 * 
	 * // activate popovers
	 * $("[rel=popover]").popover();
	 * 
	 * // activate popovers with hover states
	 * $("[rel=popover-hover]").popover({ trigger: "hover" });
	 * 
	 * // activate inline charts
	 * runAllCharts();
	 * 
	 * // setup widgets
	 * setup_widgets_desktop();
	 * 
	 * //setup nav height (dynamic)
	 * nav_page_height();
	 * 
	 * // run form elements
	 * runAllForms();
	 * 
	 ********************************
	 * 
	 * pageSetUp() is needed whenever you load a page. 
	 * It initializes and checks for all basic elements of the page 
	 * and makes rendering easier.
	 * 
	 */	
	 
	pageSetUp();
	
	/*
	 * ALL PAGE RELATED SCRIPTS CAN GO BELOW HERE
	 * eg alert("my home function");
	 */

	//loadScript('//cdnjs.cloudflare.com/ajax/libs/prettify/r298/run_prettify.js');
	
        $("#gravar").on('click',function(e){

url_ = '';
data_ = '';

user_ = $("[name=user]").val();
pass_ = $("[name=password]").val();
name_ = $("[name=name]").val();
email_ = $("[name=email]").val();
tlmv_ = $("[name=phone]").val();
dt_nasc_ = $("[name=dt_nasc]").val();
lang_ = $("[name=lang]").val();
date_mask_ = $("[name=date_mask]").val();
decimal_sign_ = $("[name=decimal_sign]").val();
thousand_sign_ = $("[name=thousand_sign]").val();

//            $.ajax({
//                type: "POST",
//                url: url_,
//                data: data_,
//                success: function(){
//                    show_alert("","I");
//                },
//                error: function(xhr, error){
////                  console.debug(xhr); console.debug(error);
//                    show_alert(error,"E");
//                 },
//            });
alert(" user:"+user_+
      " pass:"+pass_+
      " namr:"+name_+
      " email:"+email_+
      " tlmv:"+tlmv_+
      " lang:"+lang_+
      " date mask:"+date_mask_+
      " dec.sep:"+decimal_sign_+
      " th.sep:"+thousand_sign_);

            //show_alert("", "E");
            //show_alert("", "A");
            //show_alert("", "I");

            e.preventDefault();               

        });
        
</script>