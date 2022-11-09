<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">    
     

    <div class="main-sidebar">
        <aside id="sidebar-wrapper">

          <ul class="sidebar-menu">
            <li>
               <a href="/home"><i class="far fa-chart-bar"></i><span>Tablero</span></a>
            </li>   

            @hasrole('Super Admin|Admin')
            <li class="dropdown"> 
              <a href="#" class="nav-link has-dropdown"><i class="far fa-edit"></i><span>Registrar</span></a>
              
              <ul class="dropdown-menu">                
                <li><a class="nav-link" href="/alumnos">Alumno</a></li>
                <li><a class="nav-link" href="/docentes">Docente</a></li>
                <li><a class="nav-link" href="/asignaturas">Asignatura</a></li>
              </ul>
              @endhasrole
            </li>
            
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-route"></i> <span>Movimiento</span></a>
              <ul class="dropdown-menu">

                @hasrole('Super Admin|Admin')
                <li class=active><a class="nav-link" href="/matriculas">Matricula</a></li> 
                <li><a class="nav-link" href="/retiros">Retiros</a></li> 
                <li><a class="nav-link" href="/anio_asignaturas">Asignatura</a></li> 
                <li><a class="nav-link" href="/grupoestables">Grupo Estable</a></li> 
                
               
               @endhasrole

                <li><a class="nav-link" href="/notas">Nota</a></li>              
                <li><a class="nav-link" href="/pendientes">Materia Pendiente</a></li>
                
              </ul>
            </li>

           
             @hasrole('Super Admin|Admin') 
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-cog"></i> <span>Configurar</span></a>
             
              <ul class="dropdown-menu">
                <li class=active><a class="nav-link" href="/anios">Periodo Escolar</a></li>
                <li><a class="nav-link" href="/grados">Grado o Nivel</a></li>
                <li><a class="nav-link" href="/secciones">Seccion</a></li> 
                <li><a class="nav-link" href="/cortes">Momentos Notas</a></li> 
                <li><a class="nav-link" href="/cortespendiente">Momentos Pendientes</a></li> 
              </ul>
              @endhasrole
            </li>            
          </ul>