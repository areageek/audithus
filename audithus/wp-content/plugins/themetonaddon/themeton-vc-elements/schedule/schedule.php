<?php

if (!class_exists('WPBakeryShortCode_schedule')) {
class WPBakeryShortCode_schedule extends WPBakeryShortCode{
	protected function content( $atts, $content = null){

		extract(shortcode_atts(array(
			'style' => 'fitness',
			'schedule' => '',
			'group' => '',
			'cgroup' => '',
            'extra_class' => '',
            'css' => ''
        ), $atts));

		$schedule = '';
		if (isset($atts['group'])) $schedule = vc_param_group_parse_atts($atts['group']);
        $extra_class = esc_attr($extra_class);
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'schedule', $atts );
        $extra_class .= ' '.$css_class;
		
		if ($style == 'fitness') {
			$time = array(
				'4:00am' => '',
				'7:00am' => '',
				'8:00am' => '',
				'9:00am' => '',
				'10:00am' => '',
				'11:00am' => '',
				'12:00am' => '',
				'2:00pm' => '',
				'3:00pm' => '',
				'4:00pm' => '',
				'6:00pm' => '',
				'8:00pm' => ''
				);
			$days = array(
				'sunday' => '',
				'monday' => '',
				'tuesday' => '',
				'wednesday' => '',
				'thursday' => '',
				'friday' => '',
				'saturday' => ''
				);
			$gym = array (
				'yoga' => array (
					'name' => 'Yoga',
					'days' => $days
					),
				'fitness' => array (
					'name' => 'Fitness',
					'days' => $days
					),
				);
	
			foreach ($gym as $key => $value) {
				foreach ($days as $gtime => $val) {
					$gym[$key]['days'][$gtime] = $time;
				}
			}
	
			foreach ($days as $key => $value) {
				$days[$key] = $time;
			}
			foreach ($schedule as $value) {
				$day_attr = $value['day'];
				$gym_attr = strtolower($value['gym_type']);
				$time_attr = explode(',',$value['time']);
				foreach ($time_attr as $val) {
					$gym[$gym_attr]['days'][$day_attr][strtolower($val)] = 1;
				}
			}
			$gym_data = json_encode($gym);
	
			$dropdown = '';
			$dropdown .= '<select class="themeton-fitnes-drop uk-select">';
			foreach ($gym as $key => $val) {
				 $dropdown .= '<option value="'.$key.'">'.$val['name'].'</option>';
			}
			$dropdown .= '</select>';
	
			$result = "
				<div style='display:none;' id='gym_data'>".$gym_data."</div>
				<div id='test'></div>
				<div class='dropdown'>
					".$dropdown."
				</div>
	
				<div class='schedule-table $extra_class'>	
					<table class='schedule'>
						<thead>
							<tr>
								<th>TIME</th>
								<th>SUN</th>
								<th>MON</th>
								<th>TUE</th>
								<th>WED</th>
								<th>THU</th>
								<th>FRI</th>
								<th>SAT</th>
							</tr>
						</thead>
						<tbody class='fitness-column'>
						</tbody>
					</table>
				</div>";
		}elseif ($style == 'yoga') {
			$schedule = vc_param_group_parse_atts($atts['cgroup']);
			$sort_time = array();
			foreach ($schedule as $value) {
				if (strstr($value['time'],'AM')) { 
					$str =  str_replace(' ','',$value['time']);
					$str =  str_replace('AM','',$value['time']);
					$sort_time[] = 'A'.$str;
				}
				if (strstr($value['time'],'PM')) {
					$str =  str_replace(' ','',$value['time']);
					$str =  str_replace('PM','',$value['time']);
					$sort_time[] = 'P'.$str;
				}
			}
			sort($sort_time);
			$sort_time = array_unique($sort_time);
			$table = '';
			$day = array('monday','tuesday','wednesday','thursday','friday','saturday','sunday');
			foreach ($sort_time as $value) {
				if (strstr($value,'A')) {
					$str = str_replace('A','',$value);
					$str = $str.'AM';
				}
				if (strstr($value,'P')) {
					$str = str_replace('P','',$value);
					$str = $str.'PM';
				}
				$table .='<tr><td>'.$str.'</td>';
				foreach ($day as $sday) {
					$bool = true;
					foreach ($schedule as $d)
					if ($d['day']==$sday && $str == $d['time']) { 
						$text = explode('/',$d['lesson']); 
						$table .= '<td class="lesson"><h4>'.$text[0].'</h4>'.$text[1].'</td>'; 
						$bool=false; 
					}
					if ($bool) $table .= '<td></td>';
				}
				$table .='</tr>';
			}
			$result = "<table class='yoga-schedule uk-table-responsive'>
			<thead>
				<tr>
					<th></th>
					<th>MONDAY</th>
					<th>TUESDAY</th>
					<th>WEDNESDAY</th>
					<th>THURSDAY</th>
					<th>FRIDAY</th>
					<th>SATURDAY</th>
					<th>SUNDAY</th>
				</tr>
			</thead>
			<tbody class='yoga-column'>
			$table
			</tbody>
		</table>";
		}
		return $result;
	}
}
}

function get_gym() {
	$time = array(
    	'4:00am' => '',
    	'7:00am' => '',
    	'8:00am' => '',
    	'9:00am' => '',
    	'10:00am' => '',
    	'11:00am' => '',
    	'12:00am' => '',
    	'2:00pm' => '',
    	'3:00pm' => '',
    	'4:00pm' => '',
    	'6:00pm' => '',
    	'8:00pm' => ''
    	);
	$gym = $_POST['data'];
	$column = ''; 
	$gym_tt = $_POST['gym_type'];
    foreach ($time as $key => $value) {
    	$column .= '<tr class="table-row"><td class="table-time-col">'.$key.'</td>';
   		$count = 0; $day_check = 0; $array = array();
    	foreach ($gym[$gym_tt]['days'] as $day => $val) {
    		if ($gym[$gym_tt]['days'][$day][$key]==1) array_push($array,1);
    		else array_push($array,0);
    	}
    	if (!empty($array))
    	{
    	$c = 1;
    	for ($i = 0; $i <=6; $i++)
    	{
    		if ($array[$i]==0) $column .= '<td></td>';
    		else {
    			if ($i==6) $column .= '<td class="class-time" colspan="'.$c.'">'.$gym[$gym_tt]['name'].'</td>';
    			else
    			if ($array[$i+1]==1) $c++;
    			else {
    				$column .= '<td class="class-time" colspan="'.$c.'">'.$gym[$gym_tt]['name'].'</td>';
    				$c = 1;
    			}
    		}
    	}
    	}
    	$column .= '</tr>';
    }
    print $column;
	exit;
}


add_action('wp_ajax_get_gym','get_gym');
add_action('wp_ajax_nopriv_get_gym','get_gym');

vc_map( array(
    "name" => esc_html__('Schedule', 'themetonaddon'),
    "description" => esc_html__("Classes schedule for fitness", 'themetonaddon'),
    "base" => 'schedule',
    "icon" => "mungu-vc-icon mungu-vc-icon67",
    "class" => 'mungu-vc-element',
    "content_element" => true,
    "category" => 'Themeton',
    'params' => array(
		array(
			"type" => "dropdown",
			"param_name" => "style",
			"heading" => esc_html__("Select Style", 'themetonaddon'),
			"holder"  =>  "div",
			"value" => array(
				'Fitness Style' => 'fitness',
				'Yoga Style' => 'yoga'
			),
			"description" => esc_html__("Select days", 'themetonaddon'),
		),
		array(
            "type" => "param_group",
            "param_name" => "group",
            "heading" => esc_html__("Create class schedule", 'themetonaddon'),
            "params" => array(
				array(
		    		"type" => "dropdown",
		            "param_name" => "gym_type",
		            "heading" => esc_html__("Select blabla", 'themetonaddon'),
		            "holder"  =>  "div",
		            "value" => array(
		                'yoga' => 'yoga',
		                'fitness' => 'fitness'
		            ),
		            "description" => esc_html__("Select days", 'themetonaddon'),
		    	),
				array(
		    		"type" => "dropdown",
		            "param_name" => "day",
		            "heading" => esc_html__("Days", 'themetonaddon'),
		            "holder"  =>  "div",
		            "value" => array(
		                'Monday' => 'monday',
		                'Tuesday' => 'tuesday',
		                'Wednesday' => 'wednesday',
		                'Thursday' => 'thursday',
		                'Friday' => 'friday',
		                'Saturday' => 'saturday',
		                'Sunday' => 'sunday',
		            ),
		            "description" => esc_html__("Select days", 'themetonaddon'),
		    	),
		    	array(
		    		"type" => "textfield",
		            "param_name" => "time",
		            'admin_label' => true,
		            "heading" => esc_html__("Time", 'themetonaddon'),
		            'holder' => 'div',
		            "description" => esc_html__("Restrain time by comma. Example: 4:00 PM,12:00 AM,9:00 AM", 'themetonaddon'),
		    	)
			),
			"dependency" => Array("element" => "style", "value" => "fitness")
		),
		array(
            "type" => "param_group",
            "param_name" => "cgroup",
            "heading" => esc_html__("Create class schedule", 'themetonaddon'),
            "params" => array(
		    	array(
		    		"type" => "textfield",
		            "param_name" => "lesson",
		            'admin_label' => true,
		            "heading" => esc_html__("Lesson name", 'themetonaddon'),
		            'holder' => 'div',
		            "description" => esc_html__("Lesson name example: lesson/teacher Yoga/Lena Winton ", 'themetonaddon'),
				),
				array(
		    		"type" => "dropdown",
		            "param_name" => "day",
		            "heading" => esc_html__("Days", 'themetonaddon'),
		            "holder"  =>  "div",
		            "value" => array(
		                'Monday' => 'monday',
		                'Tuesday' => 'tuesday',
		                'Wednesday' => 'wednesday',
		                'Thursday' => 'thursday',
		                'Friday' => 'friday',
		                'Saturday' => 'saturday',
		                'Sunday' => 'sunday',
		            ),
		            "description" => esc_html__("Select days", 'themetonaddon'),
		    	),
		    	array(
		    		"type" => "textfield",
		            "param_name" => "time",
		            'admin_label' => true,
		            "heading" => esc_html__("Time", 'themetonaddon'),
		            'holder' => 'div',
		            "description" => esc_html__("Restrain time by comma. Example: 6.00-7.00 AM", 'themetonaddon'),
		    	)
			),
			"dependency" => Array("element" => "style", "value" => "yoga")
		),
        array(
            "type" => "textfield",
            "param_name" => "extra_class",
            "heading" => esc_html__("Extra Class", 'themetonaddon'),
            "value" => "",
            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file. Please look at helper classes in the documentation.", 'themetonaddon'),
        ),
        array(
            'type' => 'css_editor',
            'heading' => esc_html__( 'CSS box', 'themetonaddon' ),
            "param_name" => "css",
            'group' => esc_html__( 'Design Options', 'themetonaddon' ),
        )
    )
));