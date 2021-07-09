<template>
  <ais-instant-search :search-client="searchClient" index-name="products">
    <div class="search-results-container-algolia">
      <div>
        <h2>Search</h2>
        <ais-search-box></ais-search-box>

        <ais-stats></ais-stats>

        <div class="spacer"></div>
        <h2>Categories</h2>
        <ais-refinement-list
          attribute="categories"
          :sort-by="['name:asc']"
        ></ais-refinement-list>
      </div>
      <div>
        <ais-state-results>
          <template slot-scope="{ results: { hits } }">
            <div v-for="hit in hits" :key="hit.id">
            <a :href="`/shop/${hit.slug}`">
              <div class="instantsearch-result">
                <div>
                  <img
                    :src="`/storage/${hit.image}`"
                    alt="img"
                    class="algolia-thumb-result"
                  />
                </div>
                <div>
                  <div class="result-title">
                    <ais-highlight :hit="hit" attribute="name"></ais-highlight>
                  </div>
                  <div class="result-details">
                    <ais-highlight :hit="hit" attribute="details"></ais-highlight>
                  </div>
                  <div class="result-price">
                    $ {{ (hit.price / 100).toFixed(2) }}
                  </div>
                </div>
              </div>
            </a>
            <hr />
            </div>
          </template>
          <ais-hits />
        </ais-state-results>

        <ais-pagination></ais-pagination>
      </div>
    </div>
  </ais-instant-search>
</template>

<script>
import algoliasearch from "algoliasearch/lite";

export default {
  data() {
    return {
      searchClient: algoliasearch(
        process.env.ALGOLIA_APP_ID,
        process.env.ALGOLIA_API_KEY 
      ),
    };
  },
};
</script>
