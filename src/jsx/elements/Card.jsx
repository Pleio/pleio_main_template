import React from 'react'
import { Link } from 'react-router'

export default class Card extends React.Component {
    render() {
        let bgColor = "";
        let image;
        let video;
        let readMoreText;
        let readMore;

        if (this.props.bgColor) {
            bgColor = "___" + this.props.bgColor + "-bg";
        }

        if (this.props.videoType && this.props.videoId) {
            video = (
                <div className="card__play" data-video-type={ this.props.videoType } data-video-id={ this.props.videoId }></div>
            );
        }

        if (this.props.image) {
            image = (
                <div className="card__image">
                    <img src={ this.props.image } draggable="false"/>
                    { video }
                </div>
            );
        }

        if (this.props.readMoreText) {
            readMoreText = (
                <span className="read-more__text">
                    { this.props.readMoreText }
                </span>
            )
        }

        if (this.props.readMoreLink) {
            readMore = (
                <Link className="read-more card__read-more" to={ this.props.readMoreLink }>
                    { readMoreText }
                    <span className="read-more__icon"></span>
                </Link>
            );
        }

        if (this.props.onReadMoreClick) {
            readMore = (
                <a href="javascript:void(0)" onClick={ this.props.onReadMoreClick } className="read-more card__read-more">
                    { readMoreText }
                    <span className="read-more__icon"></span>
                </a>
            );
        }

        return (
            <div className={ "card ___" + this.props.color + " " + bgColor }>
                { image }
                <h2 className="card__title">{ this.props.title }</h2>
                <div className="card__content">
                    { this.props.children }
                </div>

                { readMore }
            </div>
        )
    }
}

Card.defaultProps = {
    color: "big"
}