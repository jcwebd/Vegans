<? php 
error_reporting ( E_ALL ^ E_NOTICE );
require_once ( "conexion.php" ) ?>
<? php 
if (! $ _SESSION [user_id]) {
$ _SESSION [volver] = $ _SERVER [ 'PHP_SELF' ]. "?" . $ _SERVER [ 'QUERY_STRING' ];
encabezado ( "Ubicación: login.php" );
}
?>
<? php	
	if ( isset ( $ _GET [idElm]) && $ _GET [idElm] <> "" ) {
		$ q = "ELIMINAR DE compras DONDE 1 AND id = '$ _ OBTENER [idElm]'" ;
		$ r = $ conn -> consulta ( $ q );
	}
      $ q = "SELECT * FROM compras WHERE 1 AND cliente = '$ _ SESSION [user_id]' ORDER BY fecha DESC" ;
    $ r = $ conn -> consulta ( $ q );
    $ t = $ r -> num_rows ;
    
    $ query = "SELECT id, nombre, frase_promocional, precio, codigo, categoria FROM productos ORDER BY fecha DESC" ;
    ?>
<! DOCTYPE html >
< html  lang = " es " >
  < cabeza >
    <? php  include ( "head.php" ); ?>
    < estilo >
    . descuento {
        pantalla : ninguna;
        color de fondo : amarillo verdoso;
    }  
    </ estilo >
</ cabeza >
< cuerpo >

    <! - encabezado ->
    <? php  include ( "header.php" ); ?> <! - encabezado de aleta ->
    <! - Menú principal ->
    <? php  include ( "menu.php" ); ?>    
    <! - Fin del menú principal ->
    
    
    
    < div  class = " product-big-title-area wow fadeIn " >
        < div  class = " contenedor " >
            < div  class = " fila " >
                < div  class = " col-md-12 " >
                    < div  class = " product-bit-title text-center " >
                        < h2 > Carrito De Compras </ h2 >
                    </ div >
                </ div >
            </ div >
        </ div >
    </ div >  <! - Área de título de la página final ->
    
    < div  class = " área-de-producto-único " >
        < div  class = " zigzag-bottom " > </ div >
        < div  class = " contenedor " >
            < div  class = " fila " >
                    
                < div  class = " col-md-12 " >
                    < div  class = " product-content-right " >
                        < div  class = " woocommerce " >
                                < div  class = " table-responsive " >
                                    < table  cellspacing = " 0 " class = " shop_table cart " >
                                        < thead >
                                            < tr >
                                                < th  class = " product-thumbnail " > < i  class = " fa fa-file-image-o " aria-hidden = " true " > </ i > Foto </ th >
                                                < th  class = " product-name " > < i  class = " fa fa-shopping-cart " aria-hidden = " true " > </ i > Producto </ th >
                                                < th  class = " product-price " > < i  class = " fa fa-usd " aria-hidden = " true " > </ i > Precio </ th >
                                                < th  class = " product-amount " > Cantidad </ th >
                                                < th  class = " product-subtotal " > < i  class = " fa fa-usd " aria-hidden = " true " > </ i > Total </ th >
                                                < th > < i  class = " fa fa-cart-plus " aria-hidden = " true " > </ i > Cantidad </ th >
                                                < th > < i  class = " fa fa-times " aria-hidden = " true " > </ i > Eliminar </ th >
                                            </ tr >
                                        </ thead >
                                        < tbody >
                                        <? php  while ( $ fila = $ r -> fetch_assoc ()) { ?>
                                            < tr  class = " cart_item wow fadeIn " >
                                                < td  class = " product-thumbnail " >
                                                < img  width = " 145 " height = " 145 " alt = " <? php  echo  $ row [nombre] ?> " class = " shop_thumbnail " src = " img / <? php  echo  $ row [codigo] ?> .jpg " >
                                                </ td >

                                                < td  class = " nombre-producto " >
                                                    <? php  echo  $ fila [nombre] ?>
                                                </ td >

                                                < td  class = " precio-producto " >
                                                    < span  class = " amount " > $ <? php  echo  number_format ( $ precio = $ fila [precio], 0 , ',' , '.' ); ?>
                                                    </ span > 
                                                </ td >

                                                < td  class = " cantidad-producto " >
                                                    < div  class = " cantidad botones_added " >
                                                        <? php  echo  $ cantidad = $ fila [cantidad] ?>
                                                    </ div >
                                                </ td >

                                                < td  class = " product-subtotal " >
                                                    < span  class = " amount " > $ <? php  echo  number_format ( $ sub = $ precio * $ cantidad ); $ subtotal + = $ sub ?> </ span > 
                                                </ td >
                                                < td >
                                                    < Un  href = " modificar.php id =? <? Php?  Echo  $ fila [id]; ?> Y codigo = <? Php  echo  $ fila [codigo]; ?> " Clase =" btn btn-info " > < lapso de  clase = " glyphicon glyphicon-pencil " aria-hidden = " true " title = " modificar " > </ span > </ a >
                                                </ td >
                                                < td >
                                                    < Un  href = " carrito.php? IdElm = <? Php  echo  $ fila [id] ?> " Onclick =" retorno de confirmación ( '¿ESTA Seguro que DESEA ELIMINAR this compra?') " Clase =" btn btn-peligro " > < span  class = " glyphicon glyphicon-trash " aria-hidden = " true " > </ span > </ a >
                                                </ td >
                                            </ tr >
                                            <? php } ?>  
                                        </ tbody >
                                    </ tabla >
                                </ div >
                            < div  class = " cart-colaterals wow fadeIn " >
                            
                                < div  class = " cart_totals col-sm-6 col-xs-12 " >
                                    < h2 > Carrito total </ h2 >

                                    < table  cellspacing = " 0 " >
                                        < tbody >
                                            < tr  class = " envío " >
                                                < th > Costo De Envío </ th >
                                                < td > $ <? php 
                                                    if ( $ subtotal > 50000 ) {
                                                    $ envio = 0 ;
                                                    } elseif ( $ subtotal > 25000 ) {
                                                    $ envio = 2000 ;
                                                    } más {
                                                    $ envio = 5000 ;
                                                    }
                                                    echo  formato_número ( $ envio , 0 , ',' , '.' ); ?>
                                            </ td >
                                            </ tr >

                                            < tr  id = " descuento " <? php  if ( $ subtotal <= 50000 ): ?> class = " descuento " <? php  endif ; ? >>
                                                < td  class = " success " > Descuento 10% </ td >
                                                < td  class = " success " > - $ <? php 
                                                        if ( $ subtotal > 50000 ) {
                                                            echo  number_format ( $ descuento = ( $ subtotal ) * 0.10 , 0 , ',' , '.' );                
                                                        } más {
                                                        $ descuento = 0 ;
                                                        }
                                                ?> </ td >
                                            </ tr >
                                            < tr >
                                                < td > Subtotal </ td >
                                                < td > $ <? php  echo  number_format ( $ subtotal = ( $ subtotal + $ envio ) - $ descuento , 0 , ',' , '.' ); ?> </ td >
                                            </ tr >
                                            < tr >
                                                < td > iva 19% </ td >
                                                < td > $ <? php  echo  number_format ( $ iva = $ subtotal * 0.19 , 0 , ',' , '.' ); ?> </ td >
                                            </ tr >

                                            < tr  class = " order-total " >
                                                < th > Pedido total </ th >
                                                < td > < fuerte > < span  class = " cantidad " > $ <? php  echo  number_format ( $ total = $ subtotal + $ iva , 0 , ',' , '.' ); ?> </ span > </ strong >  </ td >
                                            </ tr >
                                            < tr >
                                                < td > Confirme Su Compra </ td >
                                                < td >
                                                    < form  id = " form1 " method = " post " action = " confirmacion.php " >
                                                        < input  type = " submit " name = " button " id = " button " value = " comprar " class = " btn btn-success " >
                                                    </ formulario >
                                                </ td >
                                            </ tr >
                                        </ tbody >
                                    </ tabla >
                                </ div >
                            </ div >
                        </ div >                        
                    </ div >                    
                </ div >
            </ div >
        </ div >
    </ div >
    <! - Pie de página ->
    <? php  include ( "footer.php" ); ?> <! - Fin de pie de página ->
    <! - JS ->
    <? php  include ( "js.php" ); ?> <! - Finalizar JS ->
    
  </ cuerpo >
</ html >