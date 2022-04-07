<footer class="main-footer">
	<div class="pull-right hidden-xs">
		<?php
			$data = date('D');
			$mes = date('M');
			$dia = date('d');
			$ano = date('Y');

			$semana = array(
				'Sun' => 'Domingo', 
				'Mon' => 'Lunes',
				'Tue' => 'Martes',
				'Wed' => 'Miercoles',
				'Thu' => 'Jueves',
				'Fri' => 'Viernes',
				'Sat' => 'Sabados'
			);

			$mes_extenso = array(
				'Jan' => 'Enero',
				'Feb' => 'Febrero',
				'Mar' => 'Marzo',
				'Apr' => 'Abril',
				'May' => 'Mayo',
				'Jun' => 'Junio',
				'Jul' => 'Julio',
				'Aug' => 'Agosto',
				'Nov' => 'Noviembre',
				'Sep' => 'Septiembre',
				'Oct' => 'Octubre',
				'Dec' => 'Diciembre'
			);

			echo "<b>".$semana["$data"] . ", {$dia} de " . $mes_extenso["$mes"] . " de {$ano}.</b>";
		?>
	</div>
	<a href="#" class="float" target="_blank">
    	<i class="fa fa-comments my-float"></i>
    </a>
	<strong>Copyright &copy; <?php echo date('Y'); ?> <a href="#">{!! \App\Models\Config::find(1)->app_name !!}</a></strong>.
</footer>

<style>
.float{
  position:fixed;
  width:60px;
  height:60px;
  bottom:40px;
  right:40px;
  background-color:#dd4b39;
  color:#FFF;
  border-radius:50px;
  text-align:center;
  font-size:30px;
  box-shadow: 2px 2px 3px #999;
  z-index:100;
}
.float:hover {
  text-decoration: none;
  color: #dd4b39;
  background-color:#fff;
}

.my-float{
  margin-top:16px;
}
</style>
