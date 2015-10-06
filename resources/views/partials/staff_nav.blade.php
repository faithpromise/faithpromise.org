<div class="PageFilters">
    <div class="PageFilters-container">
        <div class="PageFilters-content">
            <span class="PageFilters-label">Sort by:</span>
            <a class="PageFilters-option {{ $active === 'ministry' ? 'is-active' : '' }}" href="/staff">Ministry Area</a>
    <span class="PageFilters-option Dropdown-wrapper" ng-class="{ 'is-active': staff_sort_method === 'campus' }" uib-dropdown>
        <span uib-dropdown-toggle>Campus</span>
        <div class="Dropdown">
            <ul class="Dropdown-menu">
                @foreach ($campuses as $campus)
                    <li class="Dropdown-item">
                        <a href="{{ $campus->url }}#staff" class="Dropdown-link">{{ $campus->name }} ({{ $campus->location }})</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </span>
            <a class="PageFilters-option {{ $active === 'directory' ? 'is-active' : '' }}" href="/staff/directory">Name</a>
        </div>
    </div>
</div>