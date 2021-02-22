<?php
    class Modelo_calendario{
        public $calendarios;
        public function setCalendarios($calendarios){
            $this->calendarios= $calendarios;
        }
        public function getCalendarios(){
            return $this->calendarios;
        }
        public function mostrarCalendarios($finicio,$ffinal,$columnas){
            $this->calendarios="";
            $dias_semana = [
                "Sunday"=>0,
                "Monday"=>1,
                "Tuesday"=>2,
                "Wednesday"=>3,
                "Thursday"=>4,
                "Friday"=>5,
                "Saturday"=>6
            ];
            $meses=[
                "Jan"=>"Enero",
                "Feb"=>"Febrero",
                "Mar"=>"Marzo",
                "Apr"=>"Abril",
                "May"=>"Mayo",
                "Jun"=>"Junio",
                "Jul"=>"Julio",
                "Aug"=>"Agosto",
                "Sep"=>"Septiembre",
                "Oct"=>"Octubre",
                "Nov"=>"Noviembre",
                "Dec"=>"Diciembre"
            ];
            
            $fecha_inicio = "01-".$finicio;
            $fecha_final="01-".$ffinal;
            
            $mes_inicio = explode("-",$fecha_inicio);
            $mes_i=intval($mes_inicio[1]);
            $anho_i=intval($mes_inicio[2]);
            
            $mes_final = explode("-",$fecha_final);
            $mes_f=intval($mes_final[1]);
            $anho_f=intval($mes_final[2]);

            $diferencia_meses=0;
            $diferencia_anhos=0;

            if( $anho_i > $anho_f ){
                $diferencia_anhos= $anho_i-$anho_f;
            }
            else{
                $diferencia_anhos= $anho_f-$anho_i;
            }

            if( $mes_i > $mes_f ){
                $diferencia_meses= ($mes_f+12)-$mes_i;
                $diferencia_anhos--;
            }
            else{
                $diferencia_meses= $mes_f-$mes_i;
            }

            if($diferencia_anhos>0){
                $diferencia_meses=$diferencia_meses+(12*$diferencia_anhos);
            }

            $diferencia_meses++;

            $fecha_temporal=$fecha_inicio;
            $fecha_completa = strtotime($fecha_inicio);
            $anho = date("Y", $fecha_completa);
            $mes = date("M", $fecha_completa);
            $imp=0;


            ////////////////////////Imprimir archivo Log
            date_default_timezone_set("America/Mexico_city");
            $f_hoy=Date("d/m/Y H:i:s");
            $cadena="fecha-hora-ip-fecha_inicio-fecha_final";
            $cadena=$f_hoy." ".$_SERVER['REMOTE_ADDR']." ".$finicio." ".$ffinal;
            $file = fopen("../calendario/access_log", "a");
            fwrite($file, $cadena . PHP_EOL);
            fclose($file);
            /////////////////////////////////////////////

            for( $i=0;$i< ceil($diferencia_meses/$columnas);$i++ ){
                $this->calendarios.= "<tr>";
                for($ii=0; $ii<$columnas; $ii++){
                    
                    $this->calendarios.= '<td class="overflow-auto"><div class="calendar">
                        <div class="calendar-header">'.$meses[$mes].' '.$anho.'</div>
                        <div class="calendar-body">
                            <div class="days-weekend">
                                <div class="days-weekend-day">d</div>
                                <div class="days-weekend-day">l</div>
                                <div class="days-weekend-day">m</div>
                                <div class="days-weekend-day">m</div>
                                <div class="days-weekend-day">j</div>
                                <div class="days-weekend-day">v</div>
                                <div class="days-weekend-day">s</div>
                            </div>
                            <div class="days">';
                            $dia_semana = Date("l",$fecha_completa);
                            
                            $fecha_s=explode("-",$fecha_temporal);
                            $dias = cal_days_in_month(CAL_GREGORIAN,$fecha_s[1],$fecha_s[2]);
                            for($j=0 ;$j< $dias; $j++){
                                if($j==0){
                                    $start_calendar= $dias_semana[$dia_semana];
                                    for($k=0; $k< $start_calendar; $k++){
                                        $this->calendarios.= '<div class="days-month"></div>';    
                                    }
                                }
                                $tmp_day= $j+1;
                                $this->calendarios.= '<div class="days-month">'.$tmp_day.'</div>';
                            }
                        $this->calendarios.='</div>
                        </div>
                    </div></td>
                    ';
                    $temp = strtotime($fecha_temporal);
                    $fecha_temporal = date("d-m-Y", strtotime("+1 month", $temp));

                    $fecha_completa = strtotime($fecha_temporal);
                    $anho = date("Y", $fecha_completa);
                    $mes = date("M", $fecha_completa);
                    $imp++;
                    if($imp==$diferencia_meses){
                        $this->calendarios.= "</tr></tbody>";
                        return 0;
                    }
                }
                $this->calendarios.= "</tr>";
            }      
            $this->calendarios.= "</tbody>";

        }
    }
?>