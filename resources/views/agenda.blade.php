@extends('layouts.app')

@section('content')
<style>
    .agenda {
        background-color: #0f1a22;
        color: #fff;
        padding: 3rem 1rem;
        border-radius: 12px;
        max-width: 1000px;
        margin: 3rem auto;
    }
    .agenda h2 {
        color: #ff6600;
        margin-bottom: 2rem;
        text-align: center;
        font-weight: 700;
    }
    .agenda table {
        width: 100%;
        color: #fff;
    }
    .agenda th, .agenda td {
        padding: 0.6rem 1rem;
        vertical-align: top;
        border-bottom: 1px solid #333;
    }
    .agenda th {
        width: 20%;
        color: #ff6600;
    }
</style>

<div class="agenda">
    <h2>Cronograma Jornada Tecnológica SYSTECH 2025</h2>
    <table>
        <tr><th>9:00 – 9:10 am</th><td>Himno Nacional / canciones nacionales por parte de la UAM</td></tr>
        <tr><th>9:10 – 9:15 am</th><td>Palabras del Rector Ing. Martín Guevara</td></tr>
        <tr><th>9:15 – 9:20 am</th><td>Presentación de los Robot LED (Actividad Cultural)</td></tr>
        <tr><th>9:20 – 9:50 am</th><td>Dr. Jilber Urbina — “IA como extensión del pensamiento humano”</td></tr>
        <tr><th>10:00 – 10:40 am</th><td>Jesús Guzmán (México) — “AI Hacking: Cómo vulnerar una IA para aprovechar sus capacidades de manera positiva”</td></tr>
        <tr><th>10:50 – 11:20 am</th><td>Coro UAM / Coffee Break</td></tr>
        <tr><th>11:25 – 11:40 am</th><td>Empresa NEXUS — “La evolución del trabajo en la era de la IA: ¿Estamos listos?” (MSc. Arley Paredes, MSc. Cindy Romero)</td></tr>
        <tr><th>11:45 – 12:10 pm</th><td>Samsung — “Inteligencia Artificial Aplicada: El Ecosistema Samsung que Transforma tu Día a Día” (Lcda. Yamil Maradiaga)</td></tr>
        <tr><th>12:15 – 1:15 pm</th><td>Almuerzo / toco de instrumento para armonizar el salón</td></tr>
        <tr><th>1:30 – 2:00 pm</th><td>AMPM — “Conveniencia Aumentada” (Keneth Salgueiro y Vilma Berríos)</td></tr>
        <tr><th>2:05 – 2:45 pm</th><td>Receso / Coffee Break</td></tr>
        <tr><th>2:50 – 3:30 pm</th><td>Conversatorio — Msc. Osvaldo Enrique Prasca y Jesús Guzmán</td></tr>
        <tr><th>3:35 – 4:15 pm (Virtual)</th><td>Tecasa — “Big Data, Smart Decisions: Cómo la información masiva impulsa negocios y gobiernos”</td></tr>
        <tr><th>4:40 – 5:00 pm</th><td>Est Nod 32, MSc. Daniel Romagoza — “IA y la Ciberseguridad”</td></tr>
    </table>
</div>
@endsection
