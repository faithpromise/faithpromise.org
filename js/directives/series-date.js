(function (module) {
    'use strict';

    module.directive('seriesDate', directive);

    function directive() {
        return {
            restrict: 'E',
            link: Link
        };
    }

    function Link(scope, elem, attr) {

        var dateFormat = 'YYYY-MM-DD HH:mm:ss ZZ',
            now = moment().utc().startOf('day'),
            starts = moment(attr.starts, dateFormat).utc().startOf('day'),
            days_diff = starts.diff(now, 'days'),
            next_series_starts = moment(attr.nextSeriesStarts || null, dateFormat).utc().startOf('day'),
            text = '';

        // Next series has already started, just show the date for this series
        if (next_series_starts.isValid() && next_series_starts.isBefore(now)) {
            text = starts.format('MMM, YYYY');

            // Series started before today
        } else if (days_diff < 0) {
            text = 'Current series';

            // Series started today
        } else if (days_diff == 0) {
            text = 'Begins today!';

            // 6 days away (it's Sunday before it starts (on Saturday)
        } else if (days_diff == 6) {
            text = 'Begins in 1 week';

            // More than a week away
        } else if (days_diff >= 7) {
            text = 'Begins in ' + starts.diff(now, 'weeks') + ' week' + (starts.diff(now, 'weeks') > 1 ? 's' : '');

            // Less than seven days away
        } else {
            text = 'Begins this weekend';
        }

        elem.html(text);

    }

})(angular.module('app'), moment);