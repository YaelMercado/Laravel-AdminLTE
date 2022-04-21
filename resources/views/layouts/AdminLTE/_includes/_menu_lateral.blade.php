<aside class="main-sidebar">
	<section class="sidebar">
		<ul class="sidebar-menu" data-widget="tree">
			<li class="header" style="color:#fff;"> Menu <i class="fa fa-level-down"></i></li>  
			<li class="
						{{ Request::segment(1) === null ? 'active' : null }}
						{{ Request::segment(1) === 'home' ? 'active' : null }}
					  ">
				<a href="{{ route('home') }}" title="Dashboard"><i class="fa fa-dashboard"></i> <span> Inicio</span></a>
			</li>
					@if (Auth::user()->can('show-course', ''))
					
					<li class="
						{{ Request::segment(1) === 'course' ? 'active' : null }}
						">
						<a href="{{ route('course') }}" title="Programas">
							<i class="fa fa-book" aria-hidden="true"></i> <span> Programas</span>
						</a>
					</li>
					@endif
					@if (Auth::user()->can('show-estancia', ''))
					<li class="
						{{ Request::segment(1) === 'estancias' ? 'active' : null }}
						">
						<a href="{{ route('estancias') }}" title="Estancias">
							<i class="fa fa-globe"></i> <span> Estancias</span>
						</a>
					</li>
					@endif
					@if (Auth::user()->can('show-instructores', ''))
					<li class="
						{{ Request::segment(1) === 'instructores' ? 'active' : null }}
						">
						<a href="{{ route('instructores') }}" title="Instructores">
							<i class="fa fa-user-circle"></i> <span> Instructores</span>
						</a>
					</li>
					@endif
					@if (Auth::user()->can('show-carrers', ''))
					<li class="
						{{ Request::segment(1) === 'carrers' || Request::segment(1) === 'semestre' || Request::segment(1) === 'materias' ? 'active' : null }}
						">
						<a href="{{ route('carrers') }}" title="Carreras">
							<i class="fa fa-graduation-cap"></i><span> Carreras</span>
						</a>
					</li>
					@endif
					@if (Auth::user()->can('show-certificaciones', ''))
					<li class="
						{{ Request::segment(1) === 'certificaciones' || (Request::segment(1) === 'meetings' && Request::segment(3) === '2') ? 'active' : null }}
						">
						<a href="{{ route('certificaciones') }}" title="Certificaciones">
						<i class="fa fa-certificate"></i> <span> Certificaciones</span>
						</a>
					</li>
					@endif
					@if (Auth::user()->can('show-capacitaciones', ''))
					<li class="
						{{ Request::segment(1) === 'capacitaciones' || (Request::segment(1) === 'meetings' && Request::segment(3) === '1') ? 'active' : null }}
						">
						<a href="{{ route('capacitaciones') }}" title="Capacitaciones">
						<i class="fa fa-calendar-check-o" aria-hidden="true"></i> <span> Capacitaciones</span>
						</a>
					</li>
					@endif
					@if (Auth::user()->can('show-pagos', ''))
					<li class="
						{{ Request::segment(1) === 'pagos' ? 'active' : null }}
						">
						<a href="{{ route('pagos') }}" title="Pagos">
						<i class="fa fa-money" aria-hidden="true"></i> <span> Pagos</span>
						</a>
					</li>
					@endif
					@if (Auth::user()->can('show-company', ''))
					<li class="
						{{ Request::segment(1) === 'company' ? 'active' : null }}
						">
						<a href="{{ route('company') }}" title="Programas">
							<i class="fa fa-building"></i> <span> Universidades</span>
						</a>
					</li>
					@endif

			@if(Request::segment(1) === 'profile')

			<li class="{{ Request::segment(1) === 'profile' ? 'active' : null }}">
				<a href="{{ route('profile') }}" title="Profile"><i class="fa fa-user"></i> <span> Perfil</span></a>
			</li>

			@endif

			<li class="treeview 
				{{ Request::segment(1) === 'config' ? 'active menu-open' : null }}
				{{ Request::segment(1) === 'user' ? 'active menu-open' : null }}
				{{ Request::segment(1) === 'role' ? 'active menu-open' : null }}
				">
				<a href="#">
					<i class="fa fa-gear"></i>
					<span>Alta de Usuarios</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					@if (Auth::user()->can('root-dev', ''))
						<li class="{{ Request::segment(1) === 'config' && Request::segment(2) === null ? 'active' : null }}">
							<a href="{{ route('config') }}" title="App Config">
								<i class="fa fa-gear"></i> <span> Configuración de Plataforma</span>
							</a>
						</li>
					@endif					
					<li class="
						{{ Request::segment(1) === 'user' ? 'active' : null }}
						{{ Request::segment(1) === 'role' ? 'active' : null }}
						">
						<a href="{{ route('user') }}" title="Users">
							<i class="fa fa-user"></i> <span> Usuarios</span>
						</a>
					</li>
				</ul>
			</li>      
		</ul>
	</section>
</aside>