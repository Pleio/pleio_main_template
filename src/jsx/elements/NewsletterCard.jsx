import React from 'react'

import translate from '../lib/translate'
import { graphql } from 'react-apollo'
import Errors from '../elements/Errors'
import gql from 'graphql-tag'

import Card from './Card'

class NewsletterCard extends React.Component {

    constructor(e) {
        super(e)

        this.onClick = this.onClick.bind(this)
        this.onChange = this.onChange.bind(this)
        this.state = {
            email: "",
            success: false
        }
    }

    render() {
        let errors;
        if (this.state.errors) {
            errors = ( <Errors errors={this.state.errors} /> );
        }

        let email;
        if (!this.state.success) {
            email = (
                <div className="input-field">
                    <input className="validate" id="input-newsletter-email" type="email" onChange={this.onChange} value={this.state.email}></input>
                    <label htmlFor="input-newsletter-email" data-error={this.props.strings.errorEmail}>{this.props.strings.email}</label>
                </div>
            )
        } else {
            email = (
                <div>
                    {this.props.strings.success}
                </div>
            )
        }

        return (
            <Card title="Abonneer je op de nieuwsbrief" readMoreText={this.props.strings.subscribe} onReadMoreClick={!this.state.success ? this.onClick : false}>
                <p>Deze nieuwsbrief informeert en verbindt mensen door programma's, thema's, mensen voor het voetlicht te brengen.</p>
                {errors}
                <form method="POST">
                    {email}
                </form>
            </Card>
        )
    }

    onClick(e) {
        this.props.mutate({
            variables: {
                input: {
                    clientMutationId: 1,
                    email: this.state.email
                }
            }
        }).then(({data}) => {
            this.setState({
                email: "",
                errors: null,
                success: true
            })
        }).catch((errors) => {
            this.setState({
                errors: errors
            })
        })
    }

    onChange(e) {
        this.setState({
            email: e.target.value
        })
    }
}

const SUBSCRIBE = gql`
    mutation subscribeNewsletter($input: subscribeNewsletterInput!) {
        subscribeNewsletter(input: $input) {
            viewer {
                id
                loggedIn
                name
                username
            }
        }
    }
`
const withSubscribe = graphql(SUBSCRIBE)
export default withSubscribe(translate('NewsletterCard')(NewsletterCard))