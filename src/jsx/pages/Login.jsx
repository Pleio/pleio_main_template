import React from 'react'
import translate from '../lib/translate'
import { graphql } from 'react-apollo'
import Errors from '../elements/Errors'
import gql from 'graphql-tag'
import $ from 'jquery'

class Login extends React.Component {
    constructor(props) {
        super(props)

        this.state = {
            username: "",
            password: "",
            rememberMe: false,
            errors: null
        }

        this.onChangeUsername = (e) => this.setState({username: e.target.value})
        this.onChangePassword = (e) => this.setState({password: e.target.value})
        this.onChangeRememberMe = (e) => this.setState({rememberMe: e.target.checked})
        this.onLogin = this.onLogin.bind(this)
    }

    onLogin(e) {
        e.preventDefault()

        this.setState({
            errors: null
        })

        this.props.mutate({
            variables: {
                input: {
                    clientMutationId: 1,
                    username: this.state.username,
                    password: this.state.password,
                    rememberMe: this.state.rememberMe
                }
            }
        }).then(({data}) => {
            if (data.login.viewer.loggedIn === true) {
                if (typeof returnTo !== 'undefined') {
                    window.location.href = returnTo;
                } else {
                    window.location.href = "/dashboard";
                }
            }

            return true;
        }).catch((errors) => {
            this.setState({
                errors: errors
            })
        })
    }

    onSocialLogin(platform) {
        window.location = '/socialink/forward/' + platform + '/login';
    }

    render() {
        let errors;
        if (this.state.errors) {
            errors = ( <Errors errors={this.state.errors} /> );
        }

        return (
            <div className="account__content">
                <div className="button ___stretch" onClick={() => this.onSocialLogin('twitter')}>{this.props.strings.loginWithTwitter}</div>
                <div className="button ___stretch" onClick={() => this.onSocialLogin('linkedin')}>{this.props.strings.loginWithLinkedin}</div>
                <div className="account__divider"><span>{this.props.strings.or}</span></div>
                {errors}
                <form className="login" onSubmit={this.onLogin}>
                    <div className="input-field ___white">
                        <input id="input-username" name="username" type="text" value={this.state.username} onChange={this.onChangeUsername} onInput={this.onChangeUsername} placeholder=""></input>
                        <label htmlFor="input-username">{this.props.strings.username}</label>
                    </div>
                    <div className="input-field ___white">
                        <input id="input-password" name="password" type="password" value={this.state.password} onChange={this.onChangePassword} onInput={this.onChangePassword} placeholder=""></input>
                        <label htmlFor="input-password">{this.props.strings.password}</label>
                    </div>
                    <div className="login__buttons">
                        <div>
                            <button name="login" className="button ___stretch ___outline ___active login__login" type="submit">{this.props.strings.login}</button>
                        </div>
                        <div className="forgot-password">
                            <a href="/forgotpassword">{this.props.strings.forgotPassword}</a>
                        </div>
                    </div>
                    <input name="rememberMe" className="filled-in" type="checkbox" id="remember-me" value={this.state.rememberMe} onChange={this.onChangeRememberMe}></input>
                    <label htmlFor="remember-me">{this.props.strings.rememberMe}</label>
                </form>
            </div>
        )
    }
}

const LOGIN = gql`
    mutation login($input: loginInput!) {
        login(input: $input) {
            viewer {
                id
                loggedIn
                name
                username
            }
        }
    }
`
const withLogin = graphql(LOGIN)
export default withLogin(translate('Login')(Login))