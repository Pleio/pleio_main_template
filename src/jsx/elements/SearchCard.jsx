import React from 'react'
import SearchResults from './SearchResults'
import Card from './Card'

export default class SearchCard extends React.Component {

    constructor(e) {
        super(e)

        this.onChange = this.onChange.bind(this)
        this.onSearch = this.onSearch.bind(this)
        this.onKeyUp = this.onKeyUp.bind(this)

        this.state = {
            q: ""
        }
    }

    onSearch() {

    }

    onKeyUp(e) {
        if (e.keycode == 13) { // enter
            this.onSearch()
        }
    }

    onChange(e) {
        this.setState({
            q: e.target.value
        })
    }

    render() {
        return (
            <Card title="Wat vind je op Pleio?" readMoreLink="/register" readMoreText="Registreren">
                <div className="input-field ___with-icon">
                    <input id="search" type="text" placeholder="Zoeken" data-search-input="" onKeyUp={this.onKeyUp} onChange={this.onChange} value={this.state.q} />
                        <div className="input-field__icon">
                        <div className="icon-search"></div>
                    </div>
                </div>
                <SearchResults q={this.state.q} />
            </Card>
        )
    }
}