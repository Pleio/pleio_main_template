import React from 'react'
import Navigation from './Navigation'
import Language from '../lib/Language'
import { connect } from 'react-redux'

class Container extends React.Component {
    render() {
        return (
            <Language currentLanguage={this.props.currentLanguage}>
                <div className="page-layout">
                    <Navigation />
                    {this.props.children}
                 </div>
            </Language>
        )
    }
}

function select(state) {
    return {
        currentLanguage: state.currentLanguage
    }
}

export default connect(select)(Container);