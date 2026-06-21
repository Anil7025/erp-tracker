@props([
    'eyebrow' => 'FAQs',
    'title' => 'Frequently asked questions',
    'copy' => '',
    'faqs' => [],
])

<section class="section faq-section">
  <div class="container">
    <div class="section-heading">
      <span class="eyebrow">{{ $eyebrow }}</span>
      <h2>{{ $title }}</h2>
      <p>{{ $copy }}</p>
    </div>
    <div class="faq-list">
      @foreach ($faqs as $index => $faq)
        <details {{ $loop->first ? 'open' : '' }}>
          <summary>{{ $faq[0] }}</summary>
          <p>{{ $faq[1] }}</p>
        </details>
      @endforeach
    </div>
  </div>
</section>
