<?php
if (!class_exists('WPBakeryShortCode_advanced_search')) {
    class WPBakeryShortCode_advanced_search extends WPBakeryShortCode {
        protected function content( $atts, $content = null){
            extract(shortcode_atts(array(
                'post_type' => 'post',
                'categories' => '',
                'grid' => 'uk-grid',
                'list' => '',
                'extra_class' => '',
                'css' => ''
            ), $atts));
            $extra_class = esc_attr($extra_class);
            $list = vc_param_group_parse_atts($list);
            $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'advanced_search', $atts );
            $extra_class .= ' '.$css_class;
            $content = "";
            foreach ($list as $data) {
                $code = 1;
                $class = $form = $formname = $placeholder = $metabox = $customfield = '';
                $col_class = '';
                if ($data['width']!='none') $class .= $data['width'].' ';
                if ($data['width_m']!='none') $class .= $data['width_m'].' ';
                if ($data['width_s']!='none') $class .= $data['width_s'].' ';
                if (isset($data['metabox'])) $metabox = $data['metabox'];
                if (isset($data['customfield'])) $customfield = $data['customfield'];
                if (isset($data["col_class"])) $col_class = esc_attr($data["col_class"]);
                if ($class!='') $class="class='$class $col_class'";
                switch ($data['form_type']) {
                    case "text":
                        $formname = 'text'.$code;
                        $placeholder = isset($data['placeholder']) ? $data['placeholder'] : '';
                        $form = "<input type='text' name='$formname' placeholder='$placeholder' class='uk-input' />";
                        $form .= "<input type='hidden' name='cfield-".$formname."' value='".$customfield."' >";
                        $form .= "<input type='hidden' name='meta-".$formname."' value='".$metabox."' >";
                    break;
                    case "number":
                        $formname = 'number'.$code;
                        $placeholder = isset($data['placeholder']) ? $data['placeholder'] : '';
                        $form = "<input type='number' name='$formname' placeholder='$placeholder' class='uk-input' />";
                        $form .= "<input type='hidden' name='cfield-".$formname."' value='".$customfield."' >";
                        $form .= "<input type='hidden' name='meta-".$formname."' value='".$metabox."' >";
                    break;
                    case "date":
                        $formname = 'date'.$code;
                        $placeholder = isset($data['placeholder']) ? $data['placeholder'] : '';
                        $form = "<div class='uk-line uk-position-relative'>
                            <span class='uk-form-icon uk-form-icon-flip uk-position-absolute uk-icon' style='left:auto;' data-uk-icon='icon: calendar'></span>
                            <input type='date' class='uk-input' name='$formname' placeholder='$placeholder'/>
                        </div>";
                        $form .= "<input type='hidden' name='cfield-".$formname."' value='".$customfield."' >";
                        $form .= "<input type='hidden' name='meta-".$formname."' value='".$metabox."' >";
                    break;
                    case "select":
                        $formname = 'select'.$code;
                        $placeholder = isset($data['placeholder']) ? $data['placeholder'] : '';
                        $select = '';
                        if ($placeholder!='') $select .= '<option value="" disabled selected>'.$placeholder.'</option>';
                        if ($data['select_value']!='') {
                            foreach (explode(',',$data['select_value']) as $value) {
                                $select .= '<option value="'.$value.'">'.$value.'</option>';
                            }
                        }
                        $form = "<select class='uk-select' name='$formname'>$select</select>";
                        $form .= "<input type='hidden' name='cfield-".$formname."' value='".$customfield."' >";
                        $form .= "<input type='hidden' name='meta-".$formname."' value='".$metabox."' >";
                    break;
                    case "radio":
                        $t = 0;
                        $formname = 'radio'.$code;
                        $radio = $c = '';
                        if ($data['radio_value']!='') {
                            foreach (explode(',',$data['radio_value']) as $value) {
                                if ($t == 0) { $c='checked'; $t=1; }
                                else $c= 'unchecked';
                                $radio .= '<label><input type="radio" class="uk-radio" value="'.$value.'" name="'.$formname.'" '.$c.'/>'.$value.'</label> ';
                            }
                        }
                        $form = $radio;
                        $form .= "<input type='hidden' name='cfield-".$formname."' value='".$customfield."' >";
                        $form .= "<input type='hidden' name='meta-".$formname."' value='".$metabox."' >";
                    break;
                    case "checkbox":
                        $formname = 'checkbox'.$code;
                        $radio = '';
                        if ($data['checkbox_value']!='') {
                            foreach (explode(',',$data['checkbox_value']) as $value) {
                                $val = explode('/',$value);
                                $radio .= '<label><input type="checkbox" class="uk-checkbox" value="'.$val[1].'" name="'.$formname.'" />'.$val[0].'</label> ';
                            }
                        }
                        $form = $radio;
                        $form .= "<input type='hidden' name='cfield-".$formname."' value='".$customfield."' >";
                        $form .= "<input type='hidden' name='meta-".$formname."' value='".$metabox."' >";
                    break;
                }
                $code++;
                $content .="<div $class>$form</div>";
            }
            $result = "<form action='".esc_url(home_url('/'))."' method='get'>
                <input type='hidden' name='s' value='Advanced Search'>
                <input type='hidden' name='advanced_search' value='true'>
                <input type='hidden' name='post_type' value='$post_type'>
                <input type='hidden' name='categories' value='$categories'>
                    <div class='$grid $extra_class'>
                    $content
                    <div class='uk-width-1-1 uk-flex mt4 uk-flex-center'>
                        <button type='submit' class='uk-button brandcolor pl1 pr1 uk-button-defualt'> <i data-uk-icon='icon: search;' class='uk-icon'></i>
                        </button>
                    </div>
                </div>
            </form>";
        return $result;
        }
    }
}

$post_types = get_post_types( '', 'names' );
vc_map( array(
    "name" => esc_html__('Advanced Search', 'themetonaddon'),
    "description" => esc_html__("Search fillter element", 'themetonaddon'),
    "base" => "advanced_search",
    "icon" => "mungu-vc-icon mungu-vc-icon70",
    "class" => 'mungu-vc-element',
    "category" => 'Themeton',
    'params' => array(
        array(
            "type" => "dropdown",
            "param_name" => "post_type",
            "heading" => esc_html__("Post Type", 'themetonaddon'),
            "value" => get_post_types( '', 'names' ),
            "std" => 'post'
        ),
        array(
            "type" => "textfield",
            "param_name" => "categories",
            "value" => '',
            "heading" => esc_html__("Categories", 'themetonaddon'),
            "description" => esc_html__("Enter categories, tags or custom taxonomies.", 'themetonaddon'),
        ),
        array(
            "type" => "dropdown",
            "param_name" => "grid",
            "heading" => esc_html__("Grid/Flex", 'themetonaddon'),
            "value" => array(
                'Grid' => 'uk-grid',
                'Flex' => 'uk-flex'
            ),
            "std" => 'uk-grid'
        ),
        array(
            "type" => "param_group",
            "param_name" => "list",
            "heading" => esc_html__("Form", 'themetonaddon'),
            "params" => array(
                array(
                    "type" => "textfield",
                    "param_name" => "title",
                    "value" => '',
                    "heading" => esc_html__("Title", 'themetonaddon'),
                    "holder" => 'div'
                ),
                /* Placeholder */
                array(
                    "type" => "textfield",
                    "param_name" => "placeholder",
                    "value" => '',
                    "heading" => esc_html__("Placeholder", 'themetonaddon')
                ),
                /* search customfield */
                array(
                    "type" => "textfield",
                    "param_name" => "customfield",
                    "value" => '',
                    "heading" => esc_html__("Post/Page Custom field name", 'themetonaddon'),
                    "description" => esc_html__("Search custom field", 'themetonaddon'),
                ),
                /* search metabox */
                array(
                    "type" => "textfield",
                    "param_name" => "metabox",
                    "value" => '',
                    "heading" => esc_html__("Post/Page Metabox name", 'themetonaddon'),
                    "description" => esc_html__("Search metabox", 'themetonaddon'),
                ),
                array(
                    "type" => "dropdown",
                    "param_name" => "form_type",
                    "heading" => esc_html__("Form Type", 'themetonaddon'),
                    "value" => array(
                        'Text' => 'text',
                        'Number' => 'number',
                        'Select' => 'select',
                        'Radio' => 'radio',
                        'Date' => 'date',
                        'Checkbox' => 'checkbox'
                    ),
                ),
                /* Radio button field */
                array(
                    "type" => "textfield",
                    "param_name" => "radio_value",
                    "value" => '',
                    "heading" => esc_html__("Radio value", 'themetonaddon'),
                    "description" => esc_html__("Radio button value example: Value 1,Value 2,Value 3 ..", 'themetonaddon'),
                    "dependency" => Array("element" => "form_type", "value" => array("radio"))
                ),
                /* Checkbox field */
                array(
                    "type" => "textfield",
                    "param_name" => "checkbox_value",
                    "value" => '',
                    "heading" => esc_html__("Checkbox value", 'themetonaddon'),
                    "description" => esc_html__("Checkbox value example: text/value - I have a car/yes", 'themetonaddon'),
                    "dependency" => Array("element" => "form_type", "value" => array("checkbox"))
                ),
                /* Select field */
                array(
                    "type" => "textfield",
                    "param_name" => "select_value",
                    "value" => '',
                    "heading" => esc_html__("Select options", 'themetonaddon'),
                    "description" => esc_html__("Select option value example: Value 1,Value 2,Value 3 ..", 'themetonaddon'),
                    "dependency" => Array("element" => "form_type", "value" => array("select"))
                ),
                array(
                    "type" => "dropdown",
                    "param_name" => "width",
                    "heading" => esc_html__("Column/Option Width", 'themetonaddon'),
                    "value" => array(
                        'None' => 'none',
                        'column (1/6)' => 'uk-width-1-6',
                        'column (5/6)' => 'uk-width-5-6',
                        'column (1/5)' => 'uk-width-1-5',
                        'column (2/5)' => 'uk-width-2-5',
                        'column (3/5)' => 'uk-width-3-5',
                        'column (4/5)' => 'uk-width-4-5',
                        'column (1/4)' => 'uk-width-1-4',
                        'column (3/4)' => 'uk-width-3-4',
                        'column (1/3)' => 'uk-width-1-3',
                        'column (2/3)' => 'uk-width-2-3',
                        'column (1/2)' => 'uk-width-1-2',
                        'column (1/1)' => 'uk-width-1-1',
                        'Auto' => 'uk-width-auto',
                        'Expand' => 'uk-width-expand',
                    ),
                ),
                array(
                    "type" => "dropdown",
                    "param_name" => "width_m",
                    "heading" => esc_html__("Column/Option Width @m Medium", 'themetonaddon'),
                    "value" => array(
                        'None' => 'none',
                        'column (1/6)' => 'uk-width-1-6@m',
                        'column (5/6)' => 'uk-width-5-6@m',
                        'column (1/5)' => 'uk-width-1-5@m',
                        'column (2/5)' => 'uk-width-2-5@m',
                        'column (3/5)' => 'uk-width-3-5@m',
                        'column (4/5)' => 'uk-width-4-5@m',
                        'column (1/4)' => 'uk-width-1-4@m',
                        'column (3/4)' => 'uk-width-3-4@m',
                        'column (1/3)' => 'uk-width-1-3@m',
                        'column (2/3)' => 'uk-width-2-3@m',
                        'column (1/2)' => 'uk-width-1-2@m',
                        'column (1/1)' => 'uk-width-1-1@m',
                        'Auto' => 'uk-width-auto@m',
                        'Expand' => 'uk-width-expand@m',
                    ),
                ),
                array(
                    "type" => "dropdown",
                    "param_name" => "width_s",
                    "heading" => esc_html__("Column/Option Width @s Small", 'themetonaddon'),
                    "value" => array(
                        'None' => 'none',
                        'column (1/6)' => 'uk-width-1-6@s',
                        'column (5/6)' => 'uk-width-5-6@s',
                        'column (1/5)' => 'uk-width-1-5@s',
                        'column (2/5)' => 'uk-width-2-5@s',
                        'column (3/5)' => 'uk-width-3-5@s',
                        'column (4/5)' => 'uk-width-4-5@s',
                        'column (1/4)' => 'uk-width-1-4@s',
                        'column (3/4)' => 'uk-width-3-4@s',
                        'column (1/3)' => 'uk-width-1-3@s',
                        'column (2/3)' => 'uk-width-2-3@s',
                        'column (1/2)' => 'uk-width-1-2@s',
                        'column (1/1)' => 'uk-width-1-1@s',
                        'Auto' => 'uk-width-auto@s',
                        'Expand' => 'uk-width-expand@s',
                    ),
                ),
                array(
                    "type" => "textfield",
                    "param_name" => "col_class",
                    "heading" => esc_html__("Extra Class", 'themetonaddon'),
                    "value" => "",
                    "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file. Please look at helper classes in the documentation.", 'themetonaddon'),
                ),
            ),
        ),
        array(
            "type" => "textfield",
            "param_name" => "extra_class",
            "heading" => esc_html__("Extra Class", 'themetonaddon'),
            "value" => "m0",
            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file. Please look at helper classes in the documentation.", 'themetonaddon'),
        ),
        array(
			'type' => 'css_editor',
			'heading' => esc_html__( 'CSS box', 'themetonaddon' ),
			"param_name" => "css",
			'group' => esc_html__( 'Design Options', 'themetonaddon' ),
		),
    )
));