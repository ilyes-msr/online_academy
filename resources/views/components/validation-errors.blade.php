@if ($errors->any())
    <div {{ $attributes }} dir="{{App::getLocale() == 'ar' ? 'rtl' : 'ltr'}}">
        <div class="font-medium text-red-600">{{ __('site.something_went_wrong') }}</div>

        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
