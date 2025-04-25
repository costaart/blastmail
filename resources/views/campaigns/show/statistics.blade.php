<div class="py-2">
        <x-alert info :title="__('Your campaign was sent to ' . $query['total_subscribers'] . ' subscribers of the list: '. $campaign->emailList->title)"/>
        <div class="grid grid-cols-3 gap-5 mt-5">
            <x-dashboard.card :number="$query['total_openings']" :label="__('Open')" />
            <x-dashboard.card :number="$query['unique_openings']" :label="__('Unique Opens')" />
            <x-dashboard.card :number="$query['openings_rate'] . '%'" :label="__('Open Rates')" />
            <x-dashboard.card :number="$query['total_clicks']" :label="__('Clicks')" />
            <x-dashboard.card :number="$query['unique_clicks']" :label="__('Unique Clicks')" />
            <x-dashboard.card :number="$query['clicks_rate'] . '%'" :label="__('Click Rates')" />
        </div>
</div>
