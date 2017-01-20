import React from 'react'
import translate from '../lib/translate'
import Errors from '../elements/Errors'
import { graphql } from 'react-apollo'
import gql from 'graphql-tag'

class Register extends React.Component {
    constructor(props) {
        super(props)

        this.onRegister = this.onRegister.bind(this)
        this.onChangeName = this.onChangeName.bind(this)
        this.onChangeEmail = this.onChangeEmail.bind(this)
        this.onChangePassword = this.onChangePassword.bind(this)
        this.onChangePasswordVerification = this.onChangePasswordVerification.bind(this)
        this.onChangeTerms = this.onChangeTerms.bind(this)
        this.onChangeNewsletter = this.onChangeNewsletter.bind(this)

        this.state = {
            name: "",
            email: "",
            password: "",
            passwordVerification: "",
            success: false,
            terms: false,
            newsletter: false,
            errors: null
        }
    }

    onRegister(e) {
        e.preventDefault()
        this.setState({
            errors: null
        })

        if (this.state.password != this.state.passwordVerification) {
            this.setState({
                errors: {message: 'passwords_not_the_same'}
            })

            return;
        }

        this.props.mutate({
            variables: {
                input: {
                    clientMutationId: 1,
                    name: this.state.name,
                    email: this.state.email,
                    password: this.state.password,
                    terms: this.state.terms,
                    newsletter: this.state.newsletter
                }
            }
        }).then(({data}) => {
            debugger;
            this.setState({
                name: "",
                email: "",
                password: "",
                terms: false,
                newsletter: false,
                success: true
            })
        }).catch((errors) => {
            this.setState({
                errors: errors
            })
        })

    }

    onSocialLogin(platform) {
        window.location = '/socialink/forward/' + platform + '/login';
    }

    onChangeName(e) {
        this.setState({
            name: e.target.value
        })
    }

    onChangeEmail(e) {
        this.setState({
            email: e.target.value
        })
    }

    onChangePassword(e) {
        this.setState({
            password: e.target.value
        })
    }

    onChangePasswordVerification(e) {
        this.setState({
            passwordVerification: e.target.value
        })
    }

    onChangeTerms(e) {
        this.setState({
            terms: e.target.checked
        })
    }

    onChangeNewsletter(e) {
        this.setState({
            newsletter: e.target.checked
        })
    }

    render() {
        if (this.state.success) {
            return (
                <div className="account__content">
                    <p>{this.props.strings.success}</p>
                </div>
            )
        }

        let errors;
        if (this.state.errors) {
            errors = ( <Errors errors={this.state.errors} /> );
        }

        return (
            <div className="account__content">
                <div className="button ___stretch" onClick={() => this.onSocialLogin('twitter')}>{this.props.strings.registerWithTwitter}</div>
                <div className="button ___stretch" onClick={() => this.onSocialLogin('linkedin')}>{this.props.strings.registerWithLinkedin}</div>
                <div className="account__divider"><span>{this.props.strings.or}</span></div>
                {errors}
                <form className="register" onSubmit={this.onRegister}>
                    <div className="input-field ___white">
                        <input className="validate" id="input-name" type="text" pattern=".{5,}" onChange={this.onChangeName}></input>
                        <label htmlFor="input-name" data-error={this.props.strings.errorFirstLastname} className="">{this.props.strings.firstAndLastname}</label>
                    </div>
                    <div className="input-field ___white">
                        <input className="validate" id="input-email" type="email" onChange={this.onChangeEmail}></input>
                        <label htmlFor="input-email" data-error={this.props.strings.errorEmail}>{this.props.strings.email}</label>
                    </div>
                    <div className="input-field ___white">
                        <input className="validate" id="input-set-password" type="password" pattern=".{8,}" onChange={this.onChangePassword}></input>
                        <label htmlFor="input-set-password" data-error={this.props.strings.errorPassword}>{this.props.strings.password}</label>
                    </div>
                    <div className="input-field ___white">
                        <input className="validate" id="input-password-verification" type="password" pattern=".{8,}" onChange={this.onChangePasswordVerification}></input>
                        <label htmlFor="input-password-verification" data-error={this.props.strings.errorPassword}>{this.props.strings.passwordVerification}</label>
                    </div>
                    <div className="register__checks">
                        <div className="register__check">
                            <input className="filled-in" type="checkbox" id="checkbox-terms" onChange={this.onChangeTerms}></input>
                            <label htmlFor="checkbox-terms">{this.props.strings.iAgree} <a href="/terms" target="_blank">{this.props.strings.terms}</a></label>
                        </div>
                        <div className="register__check">
                            <input className="filled-in" type="checkbox" id="checkbox-newsletter" onChange={this.onChangeNewsletter}></input>
                            <label htmlFor="checkbox-newsletter">{this.props.strings.newsletter}</label>
                        </div>
                    </div>
                    <div className="register__button">
                        <button className="button ___stretch ___outline ___active" type="submit">{this.props.strings.register}</button>
                    </div>
                </form>
            </div>
        )
    }
}

const REGISTER = gql`
    mutation register($input: registerInput!) {
        register(input: $input) {
            viewer {
                id
                loggedIn
                name
                username
            }
        }
    }
`
const withRegister = graphql(REGISTER)
export default withRegister(translate('Register')(Register))