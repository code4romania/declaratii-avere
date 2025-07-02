 <section>
     <h1 class="text-3xl font-semibold">Terenuri</h1>

     <dl class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
         @foreach ($this->statement->plots->groupBy('category') as $plots)
             <x-card
                 :label="$plots->first()->category->getLabel()"
                 :icon="$plots->first()->category->getIcon()"
                 :value="$plots->count()" />
         @endforeach
     </dl>

     <div>
         {{ $this->table }}
     </div>

 </section>
