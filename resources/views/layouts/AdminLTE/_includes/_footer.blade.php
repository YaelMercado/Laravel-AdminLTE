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
	<strong>Copyright &copy; <?php echo date('Y'); ?> <a href="#">{!! \App\Models\Config::find(1)->app_name !!}</a></strong>.
</footer>