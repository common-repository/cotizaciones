<?php
/*
Plugin Name: Cotizacion
Plugin URI: http://nordestedesign.com.ar/blog/
Description: Cotizacion del Dolar Blue y Dolar Oficial , Euro , Real
Author: Luis Daniel
Version: 1.0.0
Author URI: http://www.nordestedesign.com.ar/
*/
class XRCostaRica_Widget extends WP_Widget
{
	function XRCostaRica_Widget() {
	$widget_ops = array('classname' => 'XRCostaRica_Widget', 'description' => 'Cotizacion del dolar blue,dolar oficial, Euro , Real' );
	$this->WP_Widget( 'XRCostaRica_Widget', 'Cotizacion Dolar', $widget_ops );
	}
 
	function form( $instance )
	{
	$instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
	$title = ( $instance['title'] ) ? $instance['title'] : 'Cotizaciones' ;
	?>
	<p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p>
	<?php
	}
 																																																																																																																																																																																																																																					
	function update( $new_instance, $old_instance )
	{
	$instance = $old_instance;

	$instance['title'] = $new_instance['title'];

	return $instance;
	}
 

 
	function widget( $args, $instance )
	{
	extract( $args, EXTR_SKIP );
 	echo $before_widget;
	$title = empty( $instance['title'] ) ? ' ' : apply_filters( 'widget_title', $instance['title'] );
	if ( ! empty($title) ) {
		echo $before_title . $title . $after_title;
		

$euro=file_get_contents("https://www.dolar-bluehoy.com/viejo/api.php?d=EUR&a=ARS");


$euro = explode(',',$euro);

$real=file_get_contents("https://www.dolar-bluehoy.com/viejo/api.php?d=BRL&a=ARS");


$real = explode(',',$real);


$dolar=file_get_contents("https://www.dolar-bluehoy.com/viejo/api.php?d=USD&a=ARS");


$dolar = explode(',',$dolar);


		echo "<style type='text/css'>

.indicadoresEconomicos {
    font-size: 12px;
    line-height: 17px;
}

section{
    margin: 0;
    padding: 0;
    border: 0;
    outline: 0;
    font-weight: inherit;
    font-style: inherit;
    font-size: 100%;
    font-family: inherit;
    vertical-align: baseline;
}
.tablaCotizacion {
    border: solid 1px #DADADA;
    background-color: #fff;
}
.tablaCotizacion .subTecho {
    padding: 12px;
    padding-bottom: 0;
}

.t-54327 .techoMasVisto {
    text-transform: uppercase;
    font: normal 14px/20px suecaslabbold, georgia;
    color: #D65142;
}
.indicadoresEconomicos .tablasSecciones {
    margin: 5px 0 4px 0;
}
.tablasSecciones .gris {
    background-color: #F6F6F6;
}
.indicadoresEconomicos .moneda-1 {
    background: url('http://static.glanacion.com/v1/ln/imgs/layout/iconos/economia/moneda2.gif') no-repeat scroll 10px 3px transparent;
    padding-left: 43px!important;
}
.tablaInterna td {
    color: #4D4D4D;
    font-family: Arial;
    font-size: 12px;
    font-weight: normal;
    line-height: 14px;
    padding: 10px 5px!important;
}
.indicadoresEconomicos .moneda-2 {
    background: url('http://static.glanacion.com/v1/ln/imgs/layout/iconos/economia/moneda2.gif') no-repeat scroll 10px -26px transparent;
    padding-left: 43px!important;
}

.indicadoresEconomicos .moneda-3 {
    background: url('http://static.glanacion.com/v1/ln/imgs/layout/iconos/economia/moneda2.gif') no-repeat scroll 10px -53px transparent;
    padding-left: 43px!important;
}
.indicadoresEconomicos .moneda-4 {
    background: url('http://static.glanacion.com/v1/ln/imgs/layout/iconos/economia/moneda2.gif') no-repeat scroll 10px -81px transparent;
    padding-left: 43px!important;
}
.suba {
    color: #3C800D;
}
.baja {
    color: #BF3939;
}
.techoMasVisto {
    text-transform: uppercase;
    font: normal 14px/20px suecaslabbold, georgia;
    color: #D65142;
}
.techoMasVisto {

    padding: 5px 0 4px;
 
}
</style>" ;


echo '<section class="indicadoresEconomicos floatFix">
    <div class="tablaCotizacion">
        <div class="subTecho">
            <span class="techoMasVisto">Cotizacion</span>
        </div>
        <div class="tablasSecciones floatFix">
            <table width="100%" cellpadding="0" cellspacing="0" border="0" class="tablaInterna">
                <tbody>
                    <tr>
                        <td width="23%"><b class="color first">Moneda</b></td>
                        <td width="20%"><b class="color">Compra</b></td>
                        <td width="20%"><b class="color">Venta</b></td>
                        
                    </tr>
                    <tr class="gris">
                        <td class="
      moneda-1"><a href="#">Dolar</a></td>
      <td align="right" style="padding-right:60px;"> $ '.$dolar[4].'</td>
      <td align="right" style="padding-right:60px;"> $ '.$dolar[5].'</td>
     
        </tr>
        <tr><td class="moneda-2"><a href="#">Real</a></td>
      <td align="right" style="padding-right:60px;"> $ '.$real[4].'</td>
      <td align="right" style="padding-right:60px;"> $ '.$real[5].'</td>
      
        </tr><tr class="gris">
        <td class="moneda-3"><a href="#">Euro</a></td>
        <td align="right" style="padding-right:60px;"> $ '.$euro[4].'</td>
        <td align="right" style="padding-right:60px;"> $ '.$euro[5].'</td>
       
        </tr>
        <tr>
            <td class="moneda-4"><a href="#">Yen</a></td>
            <td align="right" style="padding-right:60px;"> $ 0,117</td>
            <td align="right" style="padding-right:60px;"> $ 0,117</td>
           
        </tr>
    </tbody>
</table>
</div>
</div>
<a title="dolar blue" href="https://dolar-bluehoy.com/">dolar blue</a> | <a title="noticias de argentina" href="http://ar.picker-news.com/">diarios de argentina</a>
</section>';

		


		echo $after_widget;
	}
  }
 
}

add_action( 'widgets_init', create_function('', 'return register_widget("XRCostaRica_Widget");') );?>