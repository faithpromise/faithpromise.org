<div class="PageFilters">
    <div class="PageFilters-container">
        <div class="PageFilters-content">
            <span class="PageFilters-label">View staff by:</span>
            <a id="to_staffByArea" class="PageFilters-option {{ $active === 'ministry' ? 'is-active' : '' }}" href="{{ route('staff') }}">Ministry Area</a>
    <span class="PageFilters-option Dropdown-wrapper" ng-class="{ 'is-active': staff_sort_method === 'campus' }" uib-dropdown>
        <span uib-dropdown-toggle>Campus</span>
        <div class="Dropdown">
            <ul class="Dropdown-menu">
                @foreach ($campuses as $campus)
                    <li class="Dropdown-item">
                        <a id="to_campus_{{ $campus->slug }}_from_staff" href="{{ $campus->url }}#staff" class="Dropdown-link">{{ $campus->name }} ({{ $campus->location }})</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </span>
            <a id="to_staffDirectory" class="PageFilters-option {{ $active === 'directory' ? 'is-active' : '' }}" href="{{ route('staffDirectory') }}">Name</a>
        </div>
    </div>
</div>