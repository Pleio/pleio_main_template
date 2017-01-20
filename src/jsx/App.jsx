import React from 'react'
import { Router, Route, IndexRoute, browserHistory } from 'react-router'

import Container from './elements/Container'
import AccountContainer from './elements/AccountContainer'

import Index from './pages/Index'
import Register from './pages/Register'
import Login from './pages/Login'
import About from './pages/About'
import OurUsers from './pages/OurUsers'
import Help from './pages/Help'

import { connect } from 'react-redux'

export default class App extends React.Component {
    render() {
        return (
            <Router history={browserHistory}>
                <Route path="/" component={Container}>
                    <IndexRoute component={Index} />
                    <Route path="/about" component={About} />
                    <Route path="/our-users" component={OurUsers} />
                    <Route path="/help" component={Help} />

                    <Route component={AccountContainer}>
                        <Route path="/login" component={Login} state={{modal:"login"}} />
                        <Route path="/register" component={Register} state={{modal:"register"}} />
                    </Route>
                </Route>
            </Router>
        )
    }
}