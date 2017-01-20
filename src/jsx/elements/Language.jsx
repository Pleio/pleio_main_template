import React from 'react'

export default class Language extends React.Component {
    render() {
        let isActive = ""
        if (this.props.currentLanguage == this.props.language) {
            isActive = "___is-active"
        }

        return (
            <a className={"navigation__language " + isActive}  href="#" onClick={() => this.props.changeLanguage(this.props.language)}>
                {this.props.language.toUpperCase()}
            </a>
        )
    }
}