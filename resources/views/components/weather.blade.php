<div data-weather-widget data-city="{{ $city ?? 'Kathmandu' }}" class="rounded-2xl border border-gray-200 bg-white p-4 shadow-sm">
    <div class="flex items-center justify-between">
        <div>
            <div class="text-sm text-gray-500">Weather</div>
            <div class="text-xl font-semibold" data-weather-city></div>
        </div>
        <div class="text-2xl font-bold" data-weather-temp>--°</div>
    </div>
    <div class="mt-2 text-gray-600" data-weather-desc>Loading...</div>
    <div class="mt-2 text-sm text-gray-500" data-weather-extra></div>
</div>

@once
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
  const widgets = document.querySelectorAll('[data-weather-widget]');
  widgets.forEach(async (el) => {
    const city = el.getAttribute('data-city') || 'Kathmandu';
    const cityEl = el.querySelector('[data-weather-city]');
    const tempEl = el.querySelector('[data-weather-temp]');
    const descEl = el.querySelector('[data-weather-desc]');
    const extraEl = el.querySelector('[data-weather-extra]');

    cityEl.textContent = city;
    try {
      const res = await fetch(`{{ route('weather.current') }}?city=${encodeURIComponent(city)}`);
      const json = await res.json();
      if (!json.ok) throw new Error(json.error || 'Failed');
      const data = json.data;
      tempEl.textContent = Math.round(data.main.temp) + '°';
      descEl.textContent = (data.weather && data.weather[0] && data.weather[0].description) ? data.weather[0].description : '—';
      extraEl.textContent = `Feels like ${Math.round(data.main.feels_like)}°, Humidity ${data.main.humidity}%`;
    } catch (e) {
      descEl.textContent = 'Unable to load weather.';
      extraEl.textContent = '';
    }
  });
});
</script>
@endpush
@endonce


