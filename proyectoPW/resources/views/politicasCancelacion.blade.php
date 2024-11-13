@extends('layouts.plantillanavbarU')

@section('modulo', '| Políticas de Cancelación')

@section('seccion')
    <link href="{{ asset('css/politicasCancelacion.css') }}" rel="stylesheet">
    
    <div class="politicas-container">
        <div class="back-button">
            <a href="{{ route('rutadetallesHoteles') }}" class="return-link">
                <i class="fas fa-arrow-left"></i>
            </a>
        </div>
        
        <div class="content-box">
            <h1>Políticas de cancelación:</h1>
            
            <div class="politicas-text">
                <p>En nuestro hotel, comprendemos que los planes de viaje pueden cambiar inesperadamente, y por ello, ofrecemos una política de cancelación flexible.</p>
                
                <p>Sin embargo, es importante que nuestros huéspedes se familiaricen con los siguientes términos y condiciones sobre futuras cancelaciones:</p>
                
                <p>Para las reservas estándar:confirmada de 48 horas de antelación a la fecha de llegada, no se aplicará ningún cargo, y el importe abonado por adelantado será reembolsado en su totalidad.</p>
                
                <p>Si la cancelación se realiza entre las 48 horas previas a la fecha de llegada o al ocurrir el no-momento, el importe de la primera noche será penalizada.</p>
                
                <p>En el caso de que un huésped no se presente al día previsto de llegada sin notificar la cancelación (también conocido como "no-show"), se aplicará el cargo de la primera noche de estancia a la tarifa preponderante al momento de la reserva. El resto de las noches será automáticamente cancelado.</p>
                
                <p>Las reservas que se hayan realizado con tarifas no reembolsables o promociones especiales están sujetas a condiciones distintas.</p>
                
                <p>En estos casos, no se permitirán cambios ni cancelaciones, y el importe total de la reserva será cobrado sin posibilidad de reembolso, independientemente de cuando se realice la cancelación.</p>
                
                <p>Para ciertos períodos especiales, como días festivos, eventos locales importantes o temporadas altas en popular que se apliquen políticas de cancelación más restrictivas. En estos casos, las cancelaciones deberán realizarse con al menos 7 días de antelación a la fecha de check-in para evitar cargos.</p>
                
                <p>Todas las solicitudes de cancelación deben ser realizadas por escrito, preferentemente a través de correo electrónico o mediante el formulario disponible en nuestra página web. Los reembolsos, en caso de que correspondan, serán procesados dentro de los 7 a 10 días hábiles posteriores a la confirmación de la cancelación, y se realizarán a la misma tarjeta o método de pago utilizado para hacer la reserva.</p>
                
                <p>Nuestro equipo está siempre disponible para asistir a nuestros huéspedes con cualquier consulta o solicitud relacionada con la política de cancelación.</p>
                
                <p>¡Gracias por su comprensión y cooperación para garantizar una experiencia fluida y transparente para todos!</p>
            </div>
        </div>
    </div>
@endsection