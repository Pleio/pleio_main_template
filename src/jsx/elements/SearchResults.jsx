import React from 'react'

import { graphql } from 'react-apollo'
import gql from 'graphql-tag'

class SearchResults extends React.Component {
    render() {
        let results = []

        if (this.props.data.search) {
            results = this.props.data.search.results.map((r) => (
                <a key={r.guid} className="search-result" href={r.url}>
                    {r.title}
                </a>
            ));
        }

        let isVisible = ""
        if (this.props.q) {
            isVisible = " ___is-visible"
        }

        return (
            <div className={"search-results " + isVisible}>
                <div className="search-results__item">
                    {results}
                </div>
            </div>
        )
    }
}

const GET_SEARCH = gql`
    query search($q: String!) {
        search(q: $q) {
            total
            results {
                guid
                title
                url
            }
        }
    }
`

const withSearch = graphql(GET_SEARCH, {
    options: (ownProps) => {
        return {
            skip: !ownProps.q,
            variables: {
                q: ownProps.q
            }
        }
    }
})

export default withSearch(SearchResults)