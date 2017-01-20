import { Link, browserHistory } from 'react-router'
import React from 'react'
import Logo from './Logo'
import translate from '../lib/translate'
import { changeLanguage } from '../actions/language'
import { connect } from 'react-redux'
import Language from './Language'
import $ from 'jquery'

class Navigation extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            navOpen: false
        }

        this.toggleNav = this.toggleNav.bind(this)
        this.handleNavigate = this.handleNavigate.bind(this)
    }

    componentWillUpdate(nextProps, nextState) {
        if (nextState.navOpen) {
            $('body').addClass('___open-nav ___sticky-nav')
        } else {
            $('body').removeClass('___open-nav')
            $('body').removeClass('___sticky-nav')
        }
    }

    componentWillUnmount() {
        $('body').removeClass('___open-nav')
        $('body').removeClass('___sticky-nav')
    }

    toggleNav() {
        this.setState({
            navOpen: !this.state.navOpen
        })
    }

    handleNavigate(e, target) {
        e.preventDefault();
        browserHistory.push(target)

        if (this.state.navOpen) {
            this.toggleNav()
        }
    }

    render() {
        return (
            <navigation className="navigation">
                <div className="navigation__top">
                    <div className="mobile-navigation__bar">
                        <div className="mobile-navigation__hamburger" onClick={ this.toggleNav }></div>
                        <a className="navigation__logo" title="Terug naar de homepage" href="/" onClick={ (e) => this.handleNavigate(e, '/') }>
                            <Logo />
                        </a>
                        <div className="mobile-navigation__spacer"></div>
                    </div>
                    <ul className="navigation__menu">
                        <li className="navigation__item"><a className="navigation__link" href="/about" onClick={ (e) => this.handleNavigate(e, '/about') }>{ this.props.strings.about }</a></li>
                        <li className="navigation__item"><a className="navigation__link" href="/our-users" onClick={ (e) => this.handleNavigate(e, '/our-users') }>{ this.props.strings.forWho }</a></li>
                        <li className="navigation__item"><a className="navigation__link" href="/help" onClick={ (e) => this.handleNavigate(e, '/help') }>{ this.props.strings.help }</a></li>
                    </ul>
                </div>
                <div className="navigation__bottom">
                    <div className="navigation__account">
                        <a href="/login">
                            <div className="button ___stretch ___outline">{ this.props.strings.login }</div>
                        </a>

                        <a href="/register">
                            <div className="button ___stretch ___white">{ this.props.strings.register }</div>
                        </a>
                    </div>
                    <div className="navigation__languages">
                        <Language language="nl" currentLanguage={this.props.currentLanguage} changeLanguage={this.props.changeLanguage} />
                        &nbsp;/&nbsp;
                        <Language language="en" currentLanguage={this.props.currentLanguage} changeLanguage={this.props.changeLanguage} />
                    </div>
                </div>
            </navigation>
        )
    }
}

function mapStateToProps(state) {
    return {
        currentLanguage: state.currentLanguage
    }
}

function mapDispatchToProps(dispatch) {
    return {
        changeLanguage: (lang) => {
            dispatch(changeLanguage(lang))
        }
    }
}

export default connect(mapStateToProps, mapDispatchToProps)(translate('Navigation')(Navigation));