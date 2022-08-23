<x-layout>
     <x-hero />
     <x-blogSection :blogs='$blogs' :catagories="$catagories" :curCatagory="$curCatagory ?? null" />
     <x-subscribe />
</x-layout>