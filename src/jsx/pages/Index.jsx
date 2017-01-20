import React from 'react'
import Card from '../elements/Card'
import SearchCard from '../elements/SearchCard'
import NewsletterCard from '../elements/NewsletterCard'

import { graphql } from 'react-apollo'
import gql from 'graphql-tag'


const SCROLL_SENSITIVITY = 0.42;
let timer;

class Index extends React.Component {
    constructor(props) {
        super(props)
        this.slidePrev = this.slidePrev.bind(this)
        this.slideNext = this.slideNext.bind(this)
        this.state = {
            scrollLeft: 0
        }

        this.handleResize = this.handleResize.bind(this)
        this.handleScroll = this.handleScroll.bind(this)
        this.calculateMaxScrollLeft = this.calculateMaxScrollLeft.bind(this)
        this.onWheel = this.onWheel.bind(this)
        this.slidePrev = this.slidePrev.bind(this)
        this.slideNext = this.slideNext.bind(this)
        this.slide = this.slide.bind(this)
    }

    componentDidMount() {
        this.calculateMaxScrollLeft()

        window.addEventListener('resize', this.handleResize)
        window.addEventListener('scroll', this.handleScroll)
    }

    componentWillUnmount() {
        window.removeEventListener('resize', this.handleResize)
        window.removeEventListener('scroll', this.handleScroll)
    }

    handleResize(e) {
        this.calculateMaxScrollLeft()
    }

    handleScroll(e) {
        if (timer) {
            window.clearTimeout(timer)
        }

        let scrollLeft = e.target.scrollLeft
        timer = window.setTimeout(() => {
            this.setState({
                scrollLeft
            })
        }, 100)
    }

    onWheel(e) {
        // only in normal view
        if (document.body.scrollWidth > document.body.scrollHeight) {
            let movement = 0;
            if (Math.abs(e.deltaY) > Math.abs(e.deltaX)) {
                movement = e.deltaY
            } else {
                movement = e.deltaX
            }

            e.preventDefault();
            this.refs.slide.scrollLeft += movement;
        }
    }

    calculateMaxScrollLeft() {
        this.setState({
            maxScrollLeft: this.refs.slide.scrollWidth - this.refs.main.offsetWidth
        })
    }

    slidePrev() {
        this.slide(Math.max(0, this.state.scrollLeft - (window.innerWidth * SCROLL_SENSITIVITY)))
    }

    slideNext() {
        this.slide(Math.min(this.state.maxScrollLeft, this.state.scrollLeft + (window.innerWidth * SCROLL_SENSITIVITY)))
    }

    slide(scrollLeft) {
        $(this.refs.slide).animate({
            scrollLeft,
            duration: 300,
            easing: "easeout"
        })
    }

    render() {
        let prevButtonClass = "";
        let nextButtonClass = "";

        if (this.state.scrollLeft > 0) {
            prevButtonClass = "___is-active";
        }

        if (this.state.scrollLeft >= this.state.maxScrollLeft) {
            nextButtonClass = "___is-disabled";
        }

        return (
            <main ref="main" className="main" onWheel={this.onWheel}>
                <div className="slide-buttons">
                    <div className={ "button ___round slide-button__prev " + prevButtonClass } onClick={ this.slidePrev }></div>
                    <div className={ "button ___round slide-button__next " + nextButtonClass } onClick={ this.slideNext }></div>
                </div>
                <div ref="slide" className="slide ___grabbable" onScroll={this.handleScroll}>
                    <div className="slide__content">
                        <Card color="red" title="Platform voor de publieke zaak" image="/mod/pleio_main_template/assets/images/publiek.svg" readMoreLink="/about">
                            Van maatschappij naar samenleving horizontaal samenwerken.
                        </Card>
                        <Card color="blue" title="De gebruiker centraal" image="/mod/pleio_main_template/assets/images/gebruiker.svg">
                            Pleio helpt jou direct aan de slag.
                        </Card>
                        <Card color="orange" title="Grenzeloos samenwerken" image="/mod/pleio_main_template/assets/images/lamp.svg">
                            Pleio helpt de denkbeeldige muren tussen partijen, departementen en burgers te slechten.
                        </Card>
                        <Card color="green" title="Hergebruik" image="/mod/pleio_main_template/assets/images/hergebruik.svg">
                            Pleio-gebruikers delen content en nieuwe functionaliteiten.
                        </Card>
                        <SearchCard />
                        <Card bgColor="blue" title="Download de Pleio app">
                            <a className="button ___stretch ___white ___icon os-apple" href="https://itunes.apple.com/nl/app/pleioapp/id1071215125">
                                Download Apple app
                            </a>
                            <a className="button ___stretch ___white ___icon os-android" href="https://play.google.com/store/apps/details?id=comp.pleio.app">
                                Download Android app
                            </a>
                        </Card>
                        <NewsletterCard />
                   </div>
                </div>
            </main>
        )
    }
}

const GET_VIEWER = gql`
    query {
        viewer {
            id
        }
    }
`

const withViewer = graphql(GET_VIEWER)
export default withViewer(Index)