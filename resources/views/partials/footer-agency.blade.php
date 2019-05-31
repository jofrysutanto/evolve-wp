{{-- UTM variable is injected via global App controller --}}
@if ($utm)
<div class="true-agency true-agency--theme-{{ $utm->theme }}">
  <a
    href="{{ $utm->url }}"
    title="{{ $utm->link_title }}"
    target="_blank"
    class="true-agency__link">
    <div class="true-agency__logo">
      <img src="{{ $utm->logo }}"
        height="16"
        alt="True Agency">
    </div>
    <div class="true-agency__text">
      {!! $utm->label !!}
    </div>
  </a>
</div>
@endif
