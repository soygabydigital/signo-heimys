@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Tablero </h3>&#160; {{ session('activo') }}
        </div>
        <div class="section-body justify-content-center">
                       
                    <div class="card">                    
                            
                            <div class="card-body">
                                <h5>Hola <strong>{{ Auth::user()->name }},</strong> {{ __('bienvenido al Sistema ') }}
                                {{ config('app.name', 'Laravel') }}</h5> 
                                        
                                <hr>
                                <div class="{{-- $formato --}}" role="alert">
                                    {{-- $mensaje --}}
                                </div>	
                                Periodo Activo: {{--$anio_activo->numero--}}					
                                <div class="row w-100">
                    
                                    <div class="col-md-2">
                                    <div class="card border-primary mb-3" style="max-width: 8rem;">
                                        <div class="card-header" style="text-align: center;">Matricula</div>
                                        <div class="card-body text-primary" style="text-align: center;">
                                          <p style="font-size:85%;"><strong>Total:</strong>
                                          Masculino: 
                                          Femenino: 
                                          ingreso: 
                                          Egreso: 
                                          Repitiente: 
                                          Mat. Pend.: </p>
                    
                                        </div>
                                      </div>
                                    </div>
                    
                                    <div class="col-md-2">
                                      <div class="card border-secondary mb-3" style="max-width: 8rem;">
                                        <div class="card-header" style="text-align: center;">Primero</div>
                                        <div class="card-body text-secondary" style="text-align: center;">
                                            <p style="font-size:85%;"><strong>Total:</strong>
                                                Masculino: 
                                                Femenino: 
                                                ingreso: 
                                                Egreso: 
                                                Repitiente: 
                                                Mat. Pend.:</p>
                                            <a href="#" class="btn btn-primary" style="font-size:85%;">Detalles</a>
                    
                                         </div>
                                      </div>
                                    </div>	
                    
                                    <div class="col-md-2">
                                      <div class="card border-secondary mb-3" style="max-width: 8rem;">
                                        <div class="card-header" style="text-align: center;">Segundo</div>
                                        <div class="card-body text-secondary" style="text-align: center;">
                                            <p style="font-size:85%;"><strong>Total:</strong>
                                                Masculino: 
                                                Femenino: 
                                                ingreso: 
                                                Egreso: 
                                                Repitiente: 
                                                Mat. Pend.: </p>
                                                <a href="#" class="btn btn-primary" style="font-size:85%;">Detalles</a>
                                          </div>
                                      </div>
                                    </div>
                    
                                    <div class="col-md-2">
                                      <div class="card border-secondary mb-3" style="max-width: 8rem;">
                                        <div class="card-header" style="text-align: center;">Tercero</div>
                                        <div class="card-body text-secondary" style="text-align: center;">
                                            <p style="font-size:85%;"><strong>Total:</strong>
                                                Masculino: 
                                                Femenino: 
                                                ingreso: 
                                                Egreso: 
                                                Repitiente: 
                                                Mat. Pend.: </p>
                                                <a href="#" class="btn btn-primary" style="font-size:85%;">Detalles</a>
                                          </div>
                                      </div>
                                    </div>
                    
                                    <div class="col-md-2">
                                      <div class="card border-secondary mb-3" style="max-width: 8rem;">
                                        <div class="card-header" style="text-align: center;">Cuarto</div>
                                        <div class="card-body text-secondary" style="text-align: center;">
                                            <p style="font-size:85%;"><strong>Total:</strong>
                                                Masculino: 
                                                Femenino: 
                                                ingreso: 
                                                Egreso: 
                                                Repitiente: 
                                                Mat. Pend.: </p>
                                                <a href="#" class="btn btn-primary" style="font-size:85%;">Detalles</a>
                                         </div>
                                      </div>
                                    </div>
                    
                                    <div class="col-md-2">
                                      <div class="card border-secondary mb-3" style="max-width: 8rem;">
                                        <div class="card-header" style="text-align: center;">Quinto</div>
                                        <div class="card-body text-secondary" style="text-align: center;">
                                            <p style="font-size:85%;"><strong>Total:</strong>
                                                Masculino:
                                                Femenino:
                                                ingreso:
                                                Egreso:
                                                Repitiente:
                                                Mat. Pend.:</p>
                                                <a href="#" class="btn btn-primary" style="font-size:85%;">Detalles</a>
                                         </div>
                                      </div>
                                    </div>
                    
                                        
                                </div>	<!-- row w-100-->			
                                </div><!-- card body -->
                                
                        
                    </div>
              
            
        </div>
    </section>
@endsection

