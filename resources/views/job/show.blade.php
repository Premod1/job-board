<x-layout>
   <x-breadcrumbs :$job class="mb-4"  :links="['Jobs' => route('jobs.index'), $job->title => '#']"/>
    <x-job-card :$job />
</x-layout>
