<template>
  <div id="autocomplete"></div>
</template>

<script>
import algoliasearch from "algoliasearch/lite";
import { autocomplete, getAlgoliaResults } from "@algolia/autocomplete-js";
import "@algolia/autocomplete-theme-classic";

export default {
  props: {
    placeholder: {
      type: String,
      default: "Search...",
    },
    indexName: {
      type: String,
      required: true,
    },
  },
  mounted() {
    var searchClient = algoliasearch(
      process.env.MIX_ALGOLIA_APP_ID,
      process.env.MIX_ALGOLIA_API_KEY
    );
// var enterPressed = false;
    // var index = searchClient.initIndex(this.indexName);
    var enterPressed = false;
    autocomplete({
      container: "#autocomplete",
      placeholder: this.placeholder,
      getSources({ query }) {
        return [
          {
            sourceId: "products",
            getItems() {
              return getAlgoliaResults({
                searchClient,
                queries: [
                  {
                    indexName: "products",
                    query,
                    params: {
                      hitsPerPage: 5,
                      attributesToSnippet: ["name:10", "description:35"],
                      snippetEllipsisText: "…",
                    },
                  },
                ],
              });
            },
            getItemInputValue({ item }) {
              return item.name;
            },
            templates: {
              item({ item, createElement }) {
                return createElement("div", {
                  dangerouslySetInnerHTML: {
                    __html: `<div class="algolia-result">
                <span>
                  <img
                    src="/storage/${item.image}"
                    alt="${item.name}"
                    class="algolia-thumb"
                  />
                   ${item.name}
                </span>
                <span>
                $${(item.price / 100).toFixed(2)}
                </span>
                </div>
                <div class="algolia-details">
                  <span>
                    ${item.details}
                  </span>
                </div>`,
                  },
                });
              },
              noResults() {
                return 'Sorry, we did not find any results for '+document.getElementById("autocomplete-0-input").value;
              },
            },
            getItemUrl({ item }) {
              enterPressed = true;
              return "/shop/"+item.slug;
            },
                       
          },
        ];
      },
     
    });
  },
};
</script>
