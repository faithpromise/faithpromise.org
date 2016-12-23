@extends('layouts.page', ['title' => 'Locations'])

@section('page')

    @cardsection(['title' => 'Find a Location', 'cards' => $campuses, 'class' => 'GridSection--center'])
    <!-- LATER: Text is not centered. Center all cardsection text? Search for occurrences -->
    <p>Join us this weekend at a location near you.</p>
    @endcardsection

    @bgsection(['title' => 'Costa Rica', 'class' => 'BackgroundSection--right', 'image' => 'images/campuses/costa-rica-tall.jpg'])
    <p>Established in 2014, in conjunction with Open Eyes Ministries, our Costa Rica Campus is Faith Promise Church’s first international campus. Through this campus, our brothers and sisters in Costa Rica are making an impact for Christ in Cañas.</p>
    <p><a class="Button" href="https://www.facebook.com/iglesiapromesadefe/">Facebook</a></p>
    @endbgsection

@endsection