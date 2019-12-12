<?php

if (!class_exists('WPBakeryShortCode_nxt_filter')) {
class WPBakeryShortCode_nxt_filter extends WPBakeryShortCode {
    protected function content( $atts, $content = null){
        extract(shortcode_atts(array(
            'post_type'     => 'room',
            'form_style'    => 'style-1',
            'column'         => '4',
            'extra_class' => '',
            'css' => ''
        ), $atts));

        $list = vc_param_group_parse_atts( $atts['list'] ); 
        $extra_class = esc_attr($extra_class);
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'nxt_filter', $atts );
        $extra_class .= ' '.$css_class;
        $lists = '';

        foreach ($list as $innerArray) {
            $form_type = isset( $innerArray['form_type'] ) ? $innerArray['form_type'] : '';
            $title = isset( $innerArray['title'] ) ? "<h5>".$innerArray['title']."</h5>" : '';
            $placeholder = isset( $innerArray['placeholder'] ) ? $innerArray['placeholder'] : '';
            $column_class = isset( $innerArray['column'] ) ? $innerArray['column'] : 'uk-width-3';
            $range = isset( $innerArray['range'] ) ? $innerArray['range'] : '';

            if( $form_style == 'style-1' ) {
                switch( $form_type ){
                    case 'checkin':
                        $lists .= "<div class='uk-width-$column_class@m uk-width-1-2@s pl2'>
                            <div class='uk-padding-small tabs-block'>
                              $title
                                <div class='input-style'>
                                    <i class='fa fa-calendar'></i>
                                    <input type='text' name='checkin' class='datepicker uk-input'>
                                </div>
                            </div>
                          </div>"; 
                    break;
                    case 'checkout':
                        $lists .= "<div class='uk-width-$column_class@m uk-width-1-2@s pl2'>
                            <div class='uk-padding-small tabs-block'>
                              $title
                                <div class='input-style'>
                                    <i class='fa fa-calendar'></i>
                                    <input type='text' name='checkout' class='datepicker uk-input'>
                                </div>
                            </div>
                          </div>";
                    break;
                    case 'guest':
                        $lists .= "<div class=' uk-width-$column_class@m uk-width-1-2@s pl2'>
                            <div class='tabs-block uk-padding-small'> 
                              $title
                                <div class='drop-wrap'>
                                
                                  <div class='drop'>
                                    <select class='uk-select' name='guest'>
                                        <option value='0'>". esc_html__('GUEST 0 ', 'themetonaddon') ."</option>
                                        <option value='1'>". esc_html__('GUEST 1 ', 'themetonaddon') ."</option>
                                        <option value='2'>". esc_html__('GUEST 2 ', 'themetonaddon') ."</option>
                                        <option value='3'>". esc_html__('GUEST 3 ', 'themetonaddon') ."</option>
                                        <option value='4'>". esc_html__('GUEST 4 ', 'themetonaddon') ."</option>
                                        <option value='5'>". esc_html__('GUEST 5 ', 'themetonaddon') ."</option>
                                        <option value='6'>". esc_html__('GUEST 6 ', 'themetonaddon') ."</option>
                                     </select>
                                   </div>
                                </div> 
                            </div>
                          </div>";
                    break;
                    case 'child':
                        $lists .= "<div class='uk-width-$column_class@m uk-width-1-2@s pl2'>
                            <div class='tabs-block uk-padding-small'>
                              $title
                                <div class='drop-wrap'>
                                  <div class='drop'>
                                     <select class='uk-select' name='child'>
                                        <option value='0'>". esc_html__('00 Child', 'themetonaddon') ."</option>
                                        <option value='1'>". esc_html__('01 Child', 'themetonaddon') ."</option>
                                        <option value='2'>". esc_html__('02 Child', 'themetonaddon') ."</option>
                                        <option value='3'>". esc_html__('03 Child', 'themetonaddon') ."</option>
                                        <option value='4'>". esc_html__('04 Child', 'themetonaddon') ."</option>
                                        <option value='5'>". esc_html__('05 Child', 'themetonaddon') ."</option>
                                        <option value='6'>". esc_html__('06 Child', 'themetonaddon') ."</option>
                                     </select>
                                   </div>
                                </div> 
                            </div>
                          </div>";
                    break;
                    case 'rooms':
                        $lists .= "<div class='uk-width-$column_class@m uk-width-1-2@s pl2'>
                                <div class='tabs-block uk-padding-small'>
                                $title
                                    <div class='drop-wrap'>
                                    <div class='drop'>
                                        <select class='uk-select' name='hotel-room'>
                                            <option value='1'>". esc_html__('ROOM 1', 'themetonaddon') ."</option>
                                            <option value='2'>". esc_html__('ROOM 2', 'themetonaddon') ."</option>
                                            <option value='3'>". esc_html__('ROOM 3', 'themetonaddon') ."</option>
                                            <option value='4'>". esc_html__('ROOM 4', 'themetonaddon') ."</option>
                                            <option value='5'>". esc_html__('ROOM 5', 'themetonaddon') ."</option>
                                            <option value='6'>". esc_html__('ROOM 6', 'themetonaddon') ."</option>
                                        </select>
                                    </div>
                                    </div> 
                                </div>
                            </div>";
                          
                break;
                case 'destination':
                        $lists .= "<div class='uk-width-$column_class@m uk-width-1-2@s pl2'>
                            <div class='tabs-block uk-padding-small'>
                              $title
                              <div class='input-style'>
                                <input type='text' placeholder='". $placeholder ."' name='s'>
                              </div>
                          </div> 
                          </div>";
                break;
                case 'rent':
                    $lists .= "<div class=' uk-width-$column_class@m uk-width-1-2@s pl2'>
                                    <div class='tabs-block uk-padding-small'> 
                                    $title
                                        <div class='drop-wrap'>
                                        <div class='drop'>
                                            <select class='uk-select' name='rent'>
                                                <option value='0'>". esc_html__('BUY ', 'themetonaddon') ."</option>
                                                <option value='1'>". esc_html__('RENT', 'themetonaddon') ."</option>
                                            </select>
                                        </div>
                                        </div> 
                                    </div>
                                </div>";
                break;
                case 'location':
                    $lists .= "<div class='uk-width-$column_class@m uk-width-1-2@s pl2'>
                        <div class='tabs-block uk-padding-small'>
                          $title
                            <div class='drop-wrap'>
                              <div class='drop'>
                                 <select class='uk-select' name='location'>
                                    <option value='0'>". esc_html__('LOCATION', 'themetonaddon') ."</option>
                                    <option value='1'>". esc_html__('01 LOCATION', 'themetonaddon') ."</option>
                                    <option value='2'>". esc_html__('02 LOCATION', 'themetonaddon') ."</option>
                                    <option value='3'>". esc_html__('03 LOCATION', 'themetonaddon') ."</option>
                                    <option value='4'>". esc_html__('04 LOCATION', 'themetonaddon') ."</option>
                                    <option value='5'>". esc_html__('05 LOCATION', 'themetonaddon') ."</option>
                                    <option value='6'>". esc_html__('06 LOCATION', 'themetonaddon') ."</option>
                                 </select>
                               </div>
                            </div> 
                        </div>
                      </div>";
                break;
                case 'property_type':
                    $lists .= "<div class='uk-width-$column_class@m uk-width-1-2@s pl2'>
                            <div class='tabs-block uk-padding-small'>
                            $title
                                <div class='drop-wrap'>
                                <div class='drop'>
                                    <select class='uk-select' name='property-type'>
                                        <option value='1'>". esc_html__('House', 'themetonaddon') ."</option>
                                        <option value='2'>". esc_html__('Real Estate', 'themetonaddon') ."</option>
                                        <option value='3'>". esc_html__('Townhouse', 'themetonaddon') ."</option>
                                    </select>
                                </div>
                                </div> 
                            </div>
                        </div>";
                      
                break;
                }
            }
            elseif( $form_style == 'style-7' ) {
                switch( $form_type ){
                    case 'checkin':
                        $lists .= "<div class='uk-width-$column_class@m uk-width-1-2@s pl2'>
                            <div class='uk-padding-small tabs-block'>
                              $title
                                <div class='input-style'>
                                    <i class='uk-icon' data-uk-icon='icon: calendar'></i>
                                    <input type='text' name='checkin' class='datepicker uk-input'>
                                </div>
                            </div>
                          </div>"; 
                    break;
                    case 'clock':
                        $lists .= "<div class='uk-width-$column_class@m uk-width-1-2@s pl2'>
                            <div class='uk-padding-small tabs-block'>
                              $title
                                <div class='input-style'>
                                    <i class='uk-icon' data-uk-icon='icon: clock'></i>
                                    <input type='text' placeholder='". $placeholder ."' name='clock'>
                                </div>
                            </div>
                          </div>";
                    break;
                    case 'guest':
                        $lists .= "<div class=' uk-width-$column_class@m uk-width-1-2@s pl2'>
                            <div class='tabs-block uk-padding-small'> 
                              $title
                                <div class='drop-wrap'>
                                
                                  <div class='drop'>
                                    <select class='uk-select' name='guest'>
                                        <option value='0'>". esc_html__('GUEST 0 ', 'themetonaddon') ."</option>
                                        <option value='1'>". esc_html__('GUEST 1 ', 'themetonaddon') ."</option>
                                        <option value='2'>". esc_html__('GUEST 2 ', 'themetonaddon') ."</option>
                                        <option value='3'>". esc_html__('GUEST 3 ', 'themetonaddon') ."</option>
                                        <option value='4'>". esc_html__('GUEST 4 ', 'themetonaddon') ."</option>
                                        <option value='5'>". esc_html__('GUEST 5 ', 'themetonaddon') ."</option>
                                        <option value='6'>". esc_html__('GUEST 6 ', 'themetonaddon') ."</option>
                                     </select>
                                   </div>
                                </div> 
                            </div>
                          </div>";
                    break;
                    case 'child':
                        $lists .= "<div class='uk-width-$column_class@m uk-width-1-2@s pl2'>
                            <div class='tabs-block uk-padding-small'>
                              $title
                                <div class='drop-wrap'>
                                  <div class='drop'>
                                     <select class='uk-select' name='child'>
                                        <option value='0'>". esc_html__('00 Child', 'themetonaddon') ."</option>
                                        <option value='1'>". esc_html__('01 Child', 'themetonaddon') ."</option>
                                        <option value='2'>". esc_html__('02 Child', 'themetonaddon') ."</option>
                                        <option value='3'>". esc_html__('03 Child', 'themetonaddon') ."</option>
                                        <option value='4'>". esc_html__('04 Child', 'themetonaddon') ."</option>
                                        <option value='5'>". esc_html__('05 Child', 'themetonaddon') ."</option>
                                        <option value='6'>". esc_html__('06 Child', 'themetonaddon') ."</option>
                                     </select>
                                   </div>
                                </div> 
                            </div>
                          </div>";
                    break;
                    case 'rooms':
                        $lists .= "<div class='uk-width-$column_class@m uk-width-1-2@s pl2'>
                                <div class='tabs-block uk-padding-small'>
                                $title
                                    <div class='drop-wrap'>
                                    <div class='drop'>
                                        <select class='uk-select' name='hotel-room'>
                                            <option value='1'>". esc_html__('ROOM 1', 'themetonaddon') ."</option>
                                            <option value='2'>". esc_html__('ROOM 2', 'themetonaddon') ."</option>
                                            <option value='3'>". esc_html__('ROOM 3', 'themetonaddon') ."</option>
                                            <option value='4'>". esc_html__('ROOM 4', 'themetonaddon') ."</option>
                                            <option value='5'>". esc_html__('ROOM 5', 'themetonaddon') ."</option>
                                            <option value='6'>". esc_html__('ROOM 6', 'themetonaddon') ."</option>
                                        </select>
                                    </div>
                                    </div> 
                                </div>
                            </div>";
                          
                break;
                case 'destination':
                        $lists .= "<div class='uk-width-$column_class@m uk-width-1-2@s pl2'>
                            <div class='tabs-block uk-padding-small'>
                              $title

                              <div class='input-style'>
                                <i class='uk-icon' data-uk-icon='icon: location'></i>
                                   <input type='text' placeholder='". $placeholder ."' name='s'>
                              </div>
                          </div> 
                          </div>";
                break;
                case 'rent':
                    $lists .= "<div class=' uk-width-$column_class@m uk-width-1-2@s pl2'>
                                    <div class='tabs-block uk-padding-small'> 
                                    $title
                                        <div class='drop-wrap'>
                                        <div class='drop'>
                                            <select  class='uk-select' name='rent'>
                                                <option value='0'>". esc_html__('BUY ', 'themetonaddon') ."</option>
                                                <option value='1'>". esc_html__('RENT', 'themetonaddon') ."</option>
                                            </select>
                                        </div>
                                        </div> 
                                    </div>
                                </div>";
                break;
                case 'location':
                    $lists .= "<div class='uk-width-$column_class@m uk-width-1-2@s pl2'>
                        <div class='tabs-block uk-padding-small'>
                             $title
                            <div class='drop-wrap'>
                              <div class='drop'>
                                 <select class='uk-select' name='location'>
                                    <option value='0'>". esc_html__('LOCATION', 'themetonaddon') ."</option>
                                    <option value='1'>". esc_html__('01 LOCATION', 'themetonaddon') ."</option>
                                    <option value='2'>". esc_html__('02 LOCATION', 'themetonaddon') ."</option>
                                    <option value='3'>". esc_html__('03 LOCATION', 'themetonaddon') ."</option>
                                    <option value='4'>". esc_html__('04 LOCATION', 'themetonaddon') ."</option>
                                    <option value='5'>". esc_html__('05 LOCATION', 'themetonaddon') ."</option>
                                    <option value='6'>". esc_html__('06 LOCATION', 'themetonaddon') ."</option>
                                 </select>
                               </div>
                            </div> 
                        </div>
                      </div>";
                break;
                case 'property_type':
                    $lists .= "<div class='uk-width-$column_class@m uk-width-1-2@s pl2'>
                            <div class='tabs-block uk-padding-small'>
                                $title
                                <div class='drop-wrap'>
                                <div class='drop'>
                                    <select class='uk-select' name='property-type'>
                                        <option value='1'>". esc_html__('House', 'themetonaddon') ."</option>
                                        <option value='2'>". esc_html__('Real Estate', 'themetonaddon') ."</option>
                                        <option value='3'>". esc_html__('Townhouse', 'themetonaddon') ."</option>
                                    </select>
                                </div>
                                </div> 
                            </div>
                        </div>";
                      
                break;
                }
            }
            elseif( $form_style == 'style-4' ) {
                switch( $form_type ){
                    case 'checkin':
                        $lists .= "<div class='uk-width-$column_class@m uk-width-1-2@s pl2'>
                            <div class='uk-padding-small tabs-block'>
                              $title
                                <div class='input-style'>
                                    <i class='fa fa-calendar'></i>
                                    <input type='text' name='checkin' class='datepicker uk-input'>
                                </div>
                            </div>
                          </div>"; 
                    break;
                    case 'domain':
                        $lists .= "<div class=' uk-width-$column_class@m uk-width-1-2@s pl2'>
                            <div class='tabs-block uk-padding-small'> 
                            $title
                                <div class='drop-wrap domselect'>
                                <div class='drop'>
                                    <select class='uk-select' name='domain'>
                                        <option value='0'>". esc_html__('COM', 'themetonaddon') ."</option>
                                        <option value='1'>". esc_html__('NET', 'themetonaddon') ."</option>
                                        <option value='2'>". esc_html__('ORG', 'themetonaddon') ."</option>
                                        <option value='3'>". esc_html__('TODAY', 'themetonaddon') ."</option>
                                        <option value='4'>". esc_html__('TK', 'themetonaddon') ."</option>
                                    </select>
                                </div>
                                </div> 
                            </div>
                        </div>";
                    break;
                    

                    case 'checkout':
                        $lists .= "<div class='uk-width-$column_class@m uk-width-1-2@s pl2'>
                            <div class='uk-padding-small tabs-block'>
                              $title
                                <div class='input-style'>
                                    <i class='fa fa-calendar'></i>
                                    <input type='text' name='checkout' class='datepicker uk-input'>
                                </div>
                            </div>
                          </div>";
                    break;
                    case 'guest':
                        $lists .= "<div class=' uk-width-$column_class@m uk-width-1-2@s pl2'>
                            <div class='tabs-block uk-padding-small'> 
                              $title
                                <div class='drop-wrap'>
                                  <div class='drop'>
                                    <select class='uk-select' name='guest'>
                                        <option value='0'>". esc_html__('GUEST 0 ', 'themetonaddon') ."</option>
                                        <option value='1'>". esc_html__('GUEST 1 ', 'themetonaddon') ."</option>
                                        <option value='2'>". esc_html__('GUEST 2 ', 'themetonaddon') ."</option>
                                        <option value='3'>". esc_html__('GUEST 3 ', 'themetonaddon') ."</option>
                                        <option value='4'>". esc_html__('GUEST 4 ', 'themetonaddon') ."</option>
                                        <option value='5'>". esc_html__('GUEST 5 ', 'themetonaddon') ."</option>
                                        <option value='6'>". esc_html__('GUEST 6 ', 'themetonaddon') ."</option>
                                     </select>
                                   </div>
                                </div> 
                            </div>
                          </div>";
                    break;
                    case 'child':
                        $lists .= "<div class='uk-width-$column_class@m uk-width-1-2@s pl2'>
                            <div class='tabs-block uk-padding-small'>
                              $title
                                <div class='drop-wrap'>
                                  <div class='drop'>
                                     <select class='uk-select' name='child'>
                                        <option value='0'>". esc_html__('00 Child', 'themetonaddon') ."</option>
                                        <option value='1'>". esc_html__('01 Child', 'themetonaddon') ."</option>
                                        <option value='2'>". esc_html__('02 Child', 'themetonaddon') ."</option>
                                        <option value='3'>". esc_html__('03 Child', 'themetonaddon') ."</option>
                                        <option value='4'>". esc_html__('04 Child', 'themetonaddon') ."</option>
                                        <option value='5'>". esc_html__('05 Child', 'themetonaddon') ."</option>
                                        <option value='6'>". esc_html__('06 Child', 'themetonaddon') ."</option>
                                     </select>
                                   </div>
                                </div> 
                            </div>
                          </div>";
                    break;
                    case 'rooms':
                        $lists .= "<div class='uk-width-$column_class@m uk-width-1-2@s pl2'>
                                <div class='tabs-block uk-padding-small'>
                                $title
                                    <div class='drop-wrap'>
                                    <div class='drop'>
                                        <select class='uk-select' name='hotel-room'>
                                            <option value='1'>". esc_html__('ROOM 1', 'themetonaddon') ."</option>
                                            <option value='2'>". esc_html__('ROOM 2', 'themetonaddon') ."</option>
                                            <option value='3'>". esc_html__('ROOM 3', 'themetonaddon') ."</option>
                                            <option value='4'>". esc_html__('ROOM 4', 'themetonaddon') ."</option>
                                            <option value='5'>". esc_html__('ROOM 5', 'themetonaddon') ."</option>
                                            <option value='6'>". esc_html__('ROOM 6', 'themetonaddon') ."</option>
                                        </select>
                                    </div>
                                    </div> 
                                </div>
                            </div>";
                          
                break;
                case 'destination':
                        $lists .= "<div class='uk-width-$column_class@m uk-width-1-2@s pl2'>
                            <div class='tabs-block uk-padding-small'>
                              $title
                              <div class='input-style'>
                                   <input type='text' placeholder='". $placeholder ."' name='s'>
                              </div>
                          </div> 
                          </div>";
                break;
                case 'rent':
                    $lists .= "<div class=' uk-width-$column_class@m uk-width-1-2@s pl2'>
                                    <div class='tabs-block uk-padding-small'> 
                                    $title
                                        <div class='drop-wrap'>
                                        <div class='drop'>
                                            <select class='uk-select' name='rent'>
                                                <option value='0'>". esc_html__('BUY ', 'themetonaddon') ."</option>
                                                <option value='1'>". esc_html__('RENT', 'themetonaddon') ."</option>
                                            </select>
                                        </div>
                                        </div> 
                                    </div>
                                </div>";
                break;
                case 'location':
                    $lists .= "<div class='uk-width-$column_class@m uk-width-1-2@s pl2'>
                        <div class='tabs-block uk-padding-small'>
                          $title
                            <div class='drop-wrap'>
                              <div class='drop'>
                                 <select class='uk-select' name='location'>
                                    <option value='0'>". esc_html__('LOCATION', 'themetonaddon') ."</option>
                                    <option value='1'>". esc_html__('01 LOCATION', 'themetonaddon') ."</option>
                                    <option value='2'>". esc_html__('02 LOCATION', 'themetonaddon') ."</option>
                                    <option value='3'>". esc_html__('03 LOCATION', 'themetonaddon') ."</option>
                                    <option value='4'>". esc_html__('04 LOCATION', 'themetonaddon') ."</option>
                                    <option value='5'>". esc_html__('05 LOCATION', 'themetonaddon') ."</option>
                                    <option value='6'>". esc_html__('06 LOCATION', 'themetonaddon') ."</option>
                                 </select>
                               </div>
                            </div> 
                        </div>
                      </div>";
                break;
                case 'property_type':
                    $lists .= "<div class='uk-width-$column_class@m uk-width-1-2@s pl2'>
                            <div class='tabs-block uk-padding-small'>
                            $title
                                <div class='drop-wrap'>
                                <div class='drop'>
                                    <select class='uk-select' name='property-type'>
                                        <option value='1'>". esc_html__('PROPERTY TYPE', 'themetonaddon') ."</option>
                                        <option value='2'>". esc_html__('House', 'themetonaddon') ."</option>
                                        <option value='3'>". esc_html__('Real Estate', 'themetonaddon') ."</option>
                                        <option value='4'>". esc_html__('Townhouse', 'themetonaddon') ."</option>
                                       
                                    </select>
                                </div>
                                </div> 
                            </div>
                        </div>";
                      
                break;
                case 'budget':
                $lists .= "<div class='uk-width-$column_class@m uk-width-1-2@s pl2'>
                        <div class='tabs-block uk-padding-small'>
                        $title
                            <div class='drop-wrap'>
                            <div class='drop'>
                                <select class='uk-select' name='property-type'>
                                    <option value='1'>". esc_html__('BUDGET', 'themetonaddon') ."</option>
                                    <option value='2'>". esc_html__('Budget 2', 'themetonaddon') ."</option>
                                    <option value='3'>". esc_html__('Budget 3', 'themetonaddon') ."</option>
                                    <option value='4'>". esc_html__('Budget 4', 'themetonaddon') ."</option>
                                    <option value='5'>". esc_html__('Budget 5', 'themetonaddon') ."</option>
                                   
                                </select>
                            </div>
                            </div> 
                        </div>
                    </div>";
                  
                break;
                }
            }
            elseif( $form_style == 'style-5' ) {
                switch( $form_type ){
                    case 'checkin':
                        $lists .= "<div class='uk-width-$column_class@m uk-width-1-2@s pl2 $form_style'>
                            <div class='uk-padding-small tabs-block'>
                              $title
                                <div class='input-style'>
                                    <i class='fa fa-calendar'></i>
                                    <input type='text' name='checkin' class='datepicker uk-input'>
                                </div>
                            </div>
                          </div>"; 
                    break;
                    case 'checkout':
                        $lists .= "<div class='uk-width-$column_class@m uk-width-1-2@s pl2'>
                            <div class='uk-padding-small tabs-block'>
                              $title
                                <div class='input-style'>
                                    <i class='fa fa-calendar'></i>
                                    <input type='text' name='checkout' class='datepicker uk-input'>
                                </div>
                            </div>
                          </div>";
                    break;
                    case 'guest':
                        $lists .= "<div class=' uk-width-$column_class@m uk-width-1-2@s pl2'>
                            <div class='tabs-block uk-padding-small'> 
                              $title
                                <div class='drop-wrap'>
                                
                                  <div class='drop'>
                                    <select class='uk-select' name='guest'>
                                        <option value='0'>". esc_html__('GUEST 0 ', 'themetonaddon') ."</option>
                                        <option value='1'>". esc_html__('GUEST 1 ', 'themetonaddon') ."</option>
                                        <option value='2'>". esc_html__('GUEST 2 ', 'themetonaddon') ."</option>
                                        <option value='3'>". esc_html__('GUEST 3 ', 'themetonaddon') ."</option>
                                        <option value='4'>". esc_html__('GUEST 4 ', 'themetonaddon') ."</option>
                                        <option value='5'>". esc_html__('GUEST 5 ', 'themetonaddon') ."</option>
                                        <option value='6'>". esc_html__('GUEST 6 ', 'themetonaddon') ."</option>
                                     </select>
                                   </div>
                                </div> 
                            </div>
                          </div>";
                    break;
                    case 'child':
                        $lists .= "<div class='uk-width-$column_class@m uk-width-1-2@s pl2'>
                            <div class='tabs-block uk-padding-small'>
                              $title
                                <div class='drop-wrap'>
                                  <div class='drop'>
                                     <select class='uk-select' name='child'>
                                        <option value='0'>". esc_html__('00 Child', 'themetonaddon') ."</option>
                                        <option value='1'>". esc_html__('01 Child', 'themetonaddon') ."</option>
                                        <option value='2'>". esc_html__('02 Child', 'themetonaddon') ."</option>
                                        <option value='3'>". esc_html__('03 Child', 'themetonaddon') ."</option>
                                        <option value='4'>". esc_html__('04 Child', 'themetonaddon') ."</option>
                                        <option value='5'>". esc_html__('05 Child', 'themetonaddon') ."</option>
                                        <option value='6'>". esc_html__('06 Child', 'themetonaddon') ."</option>
                                     </select>
                                   </div>
                                </div> 
                            </div>
                          </div>";
                    break;
                    case 'rooms':
                        $lists .= "<div class='uk-width-$column_class@m uk-width-1-2@s pl2'>
                                <div class='tabs-block uk-padding-small'>
                                $title
                                    <div class='drop-wrap'>
                                    <div class='drop'>
                                        <select class='uk-select' name='hotel-room'>
                                            <option value='1'>". esc_html__('ROOM 1', 'themetonaddon') ."</option>
                                            <option value='2'>". esc_html__('ROOM 2', 'themetonaddon') ."</option>
                                            <option value='3'>". esc_html__('ROOM 3', 'themetonaddon') ."</option>
                                            <option value='4'>". esc_html__('ROOM 4', 'themetonaddon') ."</option>
                                            <option value='5'>". esc_html__('ROOM 5', 'themetonaddon') ."</option>
                                            <option value='6'>". esc_html__('ROOM 6', 'themetonaddon') ."</option>
                                        </select>
                                    </div>
                                    </div> 
                                </div>
                            </div>";
                          
                    break;
                    case 'destination':
                        $lists .= "<div class='uk-width-$column_class@m uk-width-1-2@s pl2'>
                            <div class='tabs-block uk-padding-small'>
                              $title
                              <div class='input-style'>
                                   <input type='text' placeholder='". $placeholder ."' name='s'>
                              </div>
                          </div> 
                          </div>";
                    break;
                    case 'rent':
                         $lists .= "<div class=' uk-width-$column_class@m uk-width-1-2@s pl2'>
                                    <div class='tabs-block uk-padding-small'> 
                                    $title
                                        <div class='drop-wrap'>
                                        <div class='drop'>
                                            <select class='uk-select' name='rent'>
                                                <option value='0'>". esc_html__('BUY ', 'themetonaddon') ."</option>
                                                <option value='1'>". esc_html__('RENT', 'themetonaddon') ."</option>
                                            </select>
                                        </div>
                                        </div> 
                                    </div>
                                </div>";
                    break;
                    case 'location':
                        $lists .= "<div class='uk-width-$column_class@m uk-width-1-2@s pl2'>
                            <div class='tabs-block uk-padding-small'>
                            $title
                                <div class='drop-wrap'>
                                <div class='drop'>
                                    <select class='uk-select' name='location'>
                                        <option value='0'>". esc_html__('LOCATION', 'themetonaddon') ."</option>
                                        <option value='1'>". esc_html__('01 LOCATION', 'themetonaddon') ."</option>
                                        <option value='2'>". esc_html__('02 LOCATION', 'themetonaddon') ."</option>
                                        <option value='3'>". esc_html__('03 LOCATION', 'themetonaddon') ."</option>
                                        <option value='4'>". esc_html__('04 LOCATION', 'themetonaddon') ."</option>
                                        <option value='5'>". esc_html__('05 LOCATION', 'themetonaddon') ."</option>
                                        <option value='6'>". esc_html__('06 LOCATION', 'themetonaddon') ."</option>
                                    </select>
                                </div>
                                </div> 
                            </div>
                        </div>";
                    break;
                    case 'property_type':
                        $lists .= "<div class='uk-width-$column_class@m uk-width-1-2@s pl2'>
                                <div class='tabs-block uk-padding-small'>
                                $title
                                    <div class='drop-wrap'>
                                    <div class='drop'>
                                        <select class='uk-select' name='property-type'>
                                            <option value='1'>". esc_html__('PROPERTY TYPE', 'themetonaddon') ."</option>
                                            <option value='2'>". esc_html__('House', 'themetonaddon') ."</option>
                                            <option value='3'>". esc_html__('Real Estate', 'themetonaddon') ."</option>
                                            <option value='4'>". esc_html__('Townhouse', 'themetonaddon') ."</option>
                                        
                                        </select>
                                    </div>
                                    </div> 
                                </div>
                            </div>";
                    break;
                    case 'budget':
                        $lists .= "<div class='uk-width-$column_class@m uk-width-1-2@s pl2'>
                                <div class='tabs-block uk-padding-small'>
                                $title
                                    <div class='drop-wrap'>
                                    <div class='drop'>
                                        <select class='uk-select' name='property-type'>
                                            <option value='1'>". esc_html__('BUDGET', 'themetonaddon') ."</option>
                                            <option value='2'>". esc_html__('Budget 2', 'themetonaddon') ."</option>
                                            <option value='3'>". esc_html__('Budget 3', 'themetonaddon') ."</option>
                                            <option value='4'>". esc_html__('Budget 4', 'themetonaddon') ."</option>
                                            <option value='5'>". esc_html__('Budget 5', 'themetonaddon') ."</option>
                                        
                                        </select>
                                    </div>
                                    </div> 
                                </div>
                            </div>";
                      break;
                      case 'time':
                      $lists .= "<div class='uk-width-$column_class@m uk-width-1-2@s pl2'>
                              <div class='tabs-block uk-padding-small'>
                              $title
                                  <div class='drop-wrap'>
                                  <div class='drop'>
                                      <select class='uk-select' name='time-type'>
                                          <option value='1'>". esc_html__('TIME', 'themetonaddon') ."</option>
                                          <option value='2'>". esc_html__('TIME 2', 'themetonaddon') ."</option>
                                          <option value='3'>". esc_html__('TIME 3', 'themetonaddon') ."</option>
                                          <option value='4'>". esc_html__('TIME 4', 'themetonaddon') ."</option>
                                          <option value='5'>". esc_html__('TIME 5', 'themetonaddon') ."</option>
                                      </select>
                                  </div>
                                  </div> 
                              </div>
                          </div>";
                    break;
                }
            }
            else{
                switch( $form_type ){
                    case 'checkin':
                            $lists .= "<div class='uk-width-".$column_class ." '>
                                            <div class='input-style-1'>
                                                <span class='uk-icon'><svg width='20' height='20' viewBox='0 0 20 20' xmlns='http://www.w3.org/2000/svg'> <path d='M 2,3 2,17 18,17 18,3 2,3 Z M 17,16 3,16 3,8 17,8 17,16 Z M 17,7 3,7 3,4 17,4 17,7 Z'></path> <rect width='1' height='3' x='6' y='2'></rect> <rect width='1' height='3' x='13' y='2'></rect></svg></span>
                                                <input type='text' class='datepicker' name='checkin'>
                                            </div>
                                      </div>";
                    break;
                    case 'checkout':
                            $lists .= "<div class='uk-width-".$column_class ." '>
                                        <h4>". $title ."</h4>
                                        <div class='input-style-1'>
                                            <img src='". esc_url( get_template_directory_uri() ) ."/images/calendar_icon_grey.png' alt='".esc_attr__('Icon', 'themetonaddon')."'>
                                            <input type='text' class='datepicker' name='checkout'>
                                        </div>
                                      </div>";
                    break;
                    case 'adult':
                      $lists .= "<div class='uk-width-".$column_class ."@m uk-width-1-1@s '>
                                <div class='form-block clearfix'>
                                    <div class='form-label color-white'>". $title ."</div>
                                    <div class='drop-wrap drop-wrap-s-3'>
                                      <div class='drop'>
                                         <select name='adult'>
                                            <option value='1'>". esc_html__('01 Adult', 'themetonaddon') ."</option>
                                            <option value='2'>". esc_html__('02 Adult', 'themetonaddon') ."</option>
                                            <option value='3'>". esc_html__('03 Adult', 'themetonaddon') ."</option>
                                            <option value='4'>". esc_html__('04 Adult', 'themetonaddon') ."</option>
                                            <option value='5'>". esc_html__('05 Adult', 'themetonaddon') ."</option>
                                            <option value='6'>". esc_html__('06 Adult', 'themetonaddon') ."</option>
                                         </select>
                                       </div>
                                    </div>
                                </div>
                            </div>";
                    break;
                    case 'child':
                        $lists .= "<div class='uk-width-".$column_class ." '>
                                    <div class='form-block clearfix'>
                                        <div class='drop-wrap drop-wrap-s-3'>
                                            <div class='drop'>
                                                <select name='child'>
                                                    <option value='1'>". esc_html__('01 Child', 'themetonaddon') ."</option>
                                                    <option value='2'>". esc_html__('02 Child', 'themetonaddon') ."</option>
                                                    <option value='3'>". esc_html__('03 Child', 'themetonaddon') ."</option>
                                                    <option value='4'>". esc_html__('04 Child', 'themetonaddon') ."</option>
                                                    <option value='5'>". esc_html__('05 Child', 'themetonaddon') ."</option>
                                                    <option value='6'>". esc_html__('06 Child', 'themetonaddon') ."</option>
                                                </select>
                                           </div>
                                        </div>
                                    </div>
                                </div>";
                    break;
                    case 'rooms':
                        $lists .= "<div class='uk-width-".$column_class ." '>
                                    <div class='form-block clearfix'>
                                        <div class='form-label color-white'>". $title ."</div>
                                        <div class='drop-wrap drop-wrap-s-3'>
                                          <div class='drop'>
                                             <select name='hotel-room'>
                                                <option value='1'>". esc_html__('01 Room', 'themetonaddon') ."</option>
                                                <option value='2'>". esc_html__('02 Room', 'themetonaddon') ."</option>
                                                <option value='3'>". esc_html__('03 Room', 'themetonaddon') ."</option>
                                                <option value='4'>". esc_html__('04 Room', 'themetonaddon') ."</option>
                                                <option value='5'>". esc_html__('05 Room', 'themetonaddon') ."</option>
                                                <option value='6'>". esc_html__('06 Room', 'themetonaddon') ."</option>
                                             </select>
                                           </div>
                                        </div>
                                    </div>
                                </div>";
                    break;
                    case 'domain':
                        $lists .= "<div class='uk-width-".$column_class ." '>
                                        <div class='form-block clearfix'>
                                            <div class='drop'>
                                                <select name='domain' class='uk-select'>
                                                    <option value='1'>". esc_html__('COM', 'themetonaddon') ."</option>
                                                    <option value='2'>". esc_html__('NET', 'themetonaddon') ."</option>
                                                    <option value='3'>". esc_html__('ORG', 'themetonaddon') ."</option>
                                                    <option value='4'>". esc_html__('TODAY', 'themetonaddon') ."</option>
                                                    <option value='5'>". esc_html__('MN', 'themetonaddon') ."</option>
                                                    <option value='6'>". esc_html__('ML', 'themetonaddon') ."</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>";
                    break;
                    case 'destination':
                        $lists .= "<div class='uk-width-".$column_class ." '><div class='hotels-block'>
                                <div class='input-style-1'>
                                    <input type='text' placeholder='". $placeholder ."' required='' name='s'>
                                </div>
                               </div>
                              </div>";
                    break;
                    case 'range':
                        $lists .= "<div class='uk-width-".$column_class ."@m uk-width-1-1@s'>
                               <div class='hotels-block'>
                                  <h4>". $title ."</h4>
                                <div class='input-style-1'>
                                    <input class='uk-range' type='range' type='text' placeholder='". $placeholder ."' required=''>
                                </div>
                               </div></div>";
                        $lists .= "<div class='uk-width-".$column_class ." '>
                                    <div class='range-wrapp'>
                                        <h4>". $title ."</h4>
                                        <div class='slider-range' data-counter='$' data-position='start' data-from='0' data-to='5000' data-min='0' data-max='5000'>
                                            <div class='range'></div>
                                            <input type='text' class='amount-start' readonly value='$0' name='min-val'>
                                            <input type='hidden' name='amount-start' value='0'/>
                                            <input type='text' class='amount-end' readonly value='$1500' name='max-val'>
                                            <input type='hidden' name='amount-end' value='1500'/>
                                        </div>
                                    </div>
                                </div>";
                    break;  
                    case 'rent':
                    $lists .= "<div class=' uk-width-$column_class@m uk-width-1-2@s pl2'>
                                    <div class='tabs-block uk-padding-small'> 
                                    $title
                                        <div class='drop-wrap'>
                                        <div class='drop'>
                                            <select class='uk-select' name='rent'>
                                                <option value='0'>". esc_html__('BUY ', 'themetonaddon') ."</option>
                                                <option value='1'>". esc_html__('RENT', 'themetonaddon') ."</option>
                                            </select>
                                        </div>
                                        </div> 
                                    </div>
                                </div>";
                break;
                case 'location':
                    $lists .= "<div class='uk-width-$column_class@m uk-width-1-2@s pl2'>
                        <div class='tabs-block uk-padding-small'>
                          $title
                            <div class='drop-wrap'>
                              <div class='drop'>
                                 <select class='uk-select' name='location'>
                                    <option value='0'>". esc_html__('LOCATION', 'themetonaddon') ."</option>
                                    <option value='1'>". esc_html__('01 LOCATION', 'themetonaddon') ."</option>
                                    <option value='2'>". esc_html__('02 LOCATION', 'themetonaddon') ."</option>
                                    <option value='3'>". esc_html__('03 LOCATION', 'themetonaddon') ."</option>
                                    <option value='4'>". esc_html__('04 LOCATION', 'themetonaddon') ."</option>
                                    <option value='5'>". esc_html__('05 LOCATION', 'themetonaddon') ."</option>
                                    <option value='6'>". esc_html__('06 LOCATION', 'themetonaddon') ."</option>
                                 </select>
                               </div>
                            </div> 
                        </div>
                      </div>";
                break;
                case 'property_type':
                    $lists .= "<div class='uk-width-$column_class@m uk-width-1-2@s pl2'>
                            <div class='tabs-block uk-padding-small'>
                            $title
                                <div class='drop-wrap'>
                                <div class='drop'>
                                    <select class='uk-select' name='property-type'>
                                        <option value='1'>". esc_html__('House', 'themetonaddon') ."</option>
                                        <option value='2'>". esc_html__('Real Estate', 'themetonaddon') ."</option>
                                        <option value='3'>". esc_html__('Townhouse', 'themetonaddon') ."</option>
                                    </select>
                                </div>
                                </div> 
                            </div>
                        </div>";
                break;

                }
            }
        }

        if( $form_style == 'style-1' ) {
            $submit = '<div class="uk-width-auto">
                            <button type="submit" class="uk-button uk-button-defualt"><i class="fa fa-search"></i><span>'. esc_html__('Search now', 'themetonaddon') .'</span></button>
                          </div>';

            $return = '<div class="mungu-vc-element container '.$extra_class.'">
                    <div class="advanced-search element-filter-style-1">
                        <form method="get" action="'.esc_url(home_url('/')).'" class="uk-grid uk-padding-remove uk-form">
                            '. $lists .'
                            '. $submit .'
                            <input type="hidden" name="post_type" value="'.$post_type.'"/>
                        </form>
                    </div>
                </div>';
        }
        elseif( $form_style == 'style-7' ) {
            $submit = '<div class="uk-width-auto">
                            <button type="submit" class="uk-button uk-button-defualt"> <i class="uk-icon" data-uk-icon="icon: search;"></i></button>
                          </div>';
            $return = '<div class="mungu-vc-element container '.$extra_class.'">
                            <div class="advanced-search element-filter-'.$form_style.'">
                                <form method="get" action="'.esc_url(home_url('/')).'" class="uk-grid uk-padding-remove uk-form">
                                    '. $lists .'
                                    '. $submit .'
                                    <input type="hidden" name="post_type" value="'.$post_type.'"/>
                                </form>
                            </div>
                        </div>';
        }
        elseif( $form_style == 'style-4' ) {
            $submit = '<div class="uk-width-expand uk-flex uk-flex-middle uk-flex-center uk-padding-small search1">
                            <button type="submit" class="uk-button uk-button-defualt">'. esc_html__('Search', 'themetonaddon') .'</button>
                          </div>';
            $return = '<div class="mungu-vc-element container '.$extra_class.'">
                    <div class="advanced-search element-filter-style-4">
                        <form method="get" action="'.esc_url(home_url('/')).'" class="uk-grid uk-padding-remove uk-form uk-card uk-card-default uk-card-body">
                            '. $lists .'
                            '. $submit .'
                            <input type="hidden" name="post_type" value="'.$post_type.'"/>
                        </form>
                    </div>
                </div>';
        }elseif( $form_style == 'style-5' ) { // Hosting
            $submit = '<div class="uk-width-expand uk-flex uk-flex-middle uk-flex-center uk-padding-small">
                            <button type="submit" class="uk-button uk-button-defualt">'. esc_html__('Search', 'themetonaddon') .'</button>
                          </div>';
            $return = '<div class="mungu-vc-element container '.$extra_class.'">
                    <div class="advanced-search element-filter-style-5">
                        <form method="get" action="'.esc_url(home_url('/')).'" class="uk-grid uk-padding-remove uk-form uk-card uk-card-default uk-card-body">
                            '. $lists .'
                            '. $submit .'
                            <input type="hidden" name="post_type" value="'.$post_type.'"/>
                        </form>
                    </div>
                </div>';
        }elseif( $form_style == 'style-6') {
            $submit = '<div class="uk-width-expand uk-flex uk-flex-right p0">
                            <button type="submit" class="uk-button uk-button-defualt "><span data-uk-icon="icon: arrow-right;ratio: 2;"></span></button>
                        </div>';
            $return = '<div class="mungu-vc-element uk-padding uk-card uk-card-default uk-border-radius advanced-search element-filter-style-'.$form_style.' uk-box- '.$extra_class.'">
                            <form method="get" class="advanced-search-form uk-grid" action="'.esc_url(home_url('/')).'">
                            <div class="uk-width-auto@m uk-width-1-1@s pl6 searchhos">
                            <p> '.esc_attr('Search your ').'</p>
                             <span>'.esc_attr('DREAM DOMAIN ').'</span>
                            </div>
                            '. $lists .'
                            '. $submit .'
                                <input type="hidden" name="post_type" value="'.$post_type.'" />
                            </form>
                        </div>';
            
        }
        else {
            $submit = '<div class="uk-width-auto">
                        <button type="submit" class="uk-button uk-button-defualt mt3@s mt0@m"><span>'. esc_html__('Search', 'themetonaddon') .'</span></button>
                    </div>';
            $return = '<div class="mungu-vc-element advanced-search element-filter-style-default '.$extra_class.'">
                            <form method="get" class="advanced-search-form uk-grid" action="'.esc_url(home_url('/')).'">
                            '. $lists .'
                            '. $submit .'
                            <input type="hidden" name="post_type" value="'.$post_type.'"/>
                            </form>
                        </div>';
          }
        return $return;
    }
}
}

vc_map( array(
    "name" => esc_html__('Advanced Search', 'themetonaddon'),
    "description" => esc_html__("Custom filter builder", 'themetonaddon'),
    "base" => 'nxt_filter',
    "icon" => "mungu-vc-icon mungu-vc-icon57",
    "class" => 'mungu-vc-element',
    "content_element" => true,
    "category" => 'Themeton',
    'params' => array(
        array(
            "type" => "dropdown",
            "param_name" => "post_type",
            "heading" => esc_html__("Post Type", 'themetonaddon'),
            "value" => array(
                "Portfolio" => "portfolio",
                "Service" => "service",
                "Faq" => "faq",
                "Rent" => "rent",
                "Team" => "team",
                "Cause" => "cause",
                "Hotel-room" => "hotel",
                "Rent" => "rent",
            ),
            "std" => "team",
            "holder" => "div"
        ),
        array(
            "type" => "dropdown",
            "param_name" => "form_style",
            "heading" => esc_html__("Form style", 'themetonaddon'),
            "value" => array(
                "Style 1 (Bordered)" => "style-1",
                "Style 2" => "style-2",
                "Style 3" => "style-4",
                "Style 4 / CAR RENTAL /" => "style-5",
                "Style 5" => "style-6",
                "Style 6 / CAR RENTAL with use hot deals with /" => "style-7",
            ),
            "std" => "style-1"
        ),
        array(
            'type' => 'param_group',
            'heading' => esc_html__( 'Build your Search Form Fields / Values', 'themetonaddon' ),
            'param_name' => 'list',
            'value' => '',
            'params' => array(
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Title', 'themetonaddon' ),
                    'param_name' => 'title',
                    'description' => esc_html__( 'Only show style 1', 'themetonaddon' )
                ),
                array(
                    "type" => "dropdown",
                    "param_name" => "form_type",
                    "heading" => esc_html__("Forms", 'themetonaddon'),
                    "value" => array(
                        "Check In field" => "checkin",
                        "Check Out field" => "checkout",
                        "Adult field" => "adult",
                        "Guest field" => "guest",
                        "Rooms field" => "rooms",
                        "Destination field" => "destination",
                        "Buy" => "rent",
                        "Location" => "location",
                        "Property_type" => "property_type",
                        "Budget" => "budget",
                        "Time" => "time",
                        "Domain" => "domain",
                        "Clock" => "clock",
                    ),
                    "std" => "checkin"
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Placeholder', 'themetonaddon' ),
                    'param_name' => 'placeholder',
                    'description' => esc_html__( 'Placeholder', 'themetonaddon' ),
                    'admin_label' => true
                ),
                array(
                    "type" => "dropdown",
                    "param_name" => "column",
                    "heading" => esc_html__("Column / Option Width", 'themetonaddon'),
                    "value" => array( 
                        "1 column (1/12)" => "1-1",
                        "2 column (1/2)" => "1-2",
                        "3 column (1/3)" => "1-3",
                        "4 column (1/4)" => "1-4",
                        "5 column (1/5)" => "1-5",
                        "6 column (1/6)" => "1-6",
                        "7 coloumn (2/3)" => "2-3",
                        "8 coloumn (3/4)" => "3-4",
                        "auto" => "auto",
                        "Expand" => "expand"
                    ),
                    'description' => "",
                    "std" => "1-3"
                )
            )
        ),
        array(
            "type" => "textfield",
            "param_name" => "extra_class",
            "heading" => esc_html__("Extra Class", 'themetonaddon'),
            "value" => "",
            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'themetonaddon'),
        ),
        array(
            'type' => 'css_editor',
            'heading' => esc_html__( 'CSS box', 'themetonaddon' ),
            "param_name" => "css",
            'group' => esc_html__( 'Design Options', 'themetonaddon' ),
        )
    )
));