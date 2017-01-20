import React from 'react'
import translate from '../lib/translate'

class Errors extends React.Component {
    render() {
        let errors = [];
        if (this.props.errors.graphQLErrors) {
            errors = this.props.errors.graphQLErrors.map((error) => { return error.message })
        } else {
            errors.push(this.props.errors.message)
        }

        let displayErrors = errors.map(function(error) {
            let displayError = error;
            if (error in this.props.strings) {
                displayError = this.props.strings[error]
            } else {
                displayError = this.props.strings['unknown_error']
            }

            return (
                <div key={error}>{displayError}</div>
            )
        }.bind(this))

        return (
            <div className="messages error">{displayErrors}</div>
        )
    }
}

export default translate('Errors')(Errors)