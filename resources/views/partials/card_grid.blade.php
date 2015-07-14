<ul class="Card-grid" card-grid>
    @foreach ($cards as $card)
        <li class="Card-item">
            @include('partials.card', [
              'title' => $card['title'],
              'text' => $card['text'],
              'image' => $card['image'],
              'url' => $card['url'],
              'url_text' => $card['url_text']
              ])
        </li>
    @endforeach
</ul>