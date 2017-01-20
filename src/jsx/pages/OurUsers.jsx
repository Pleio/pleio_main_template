import React from 'react'

export default class OurUsers extends React.Component {
    render() {
        return (
            <main className="main" data-scroll-horizontal-target>
                <article className="article">
                    <div className="button ___round article__to-top" data-scroll-to-top=""></div>
                    <div className="article__header">
                        <div className="row">
                            <div className="col-lg-6">
                                <h1>Voor wie?</h1>
                            </div>
                            <div className="col-lg-6 center-xs">
                                <img className="article__image" src="/mod/pleio_main_template/assets/images/gebruiker.svg" />
                            </div>
                        </div>
                    </div>
                    <div className="article__body">
                        <ul className="disc">
                            <li>Voor eenieder die met andere mensen samenwerkt aan de publieke zaak</li>
                            <li>Voor eenieder die hart heeft voor de publieke zaak. Het huidige tijdsgewricht vraagt om het nemen van verantwoordelijkheid.</li>
                            <li>Voor eenieder die beseft dat de overheid niet langer alleen aan het roer staat. Het huidige tijdsgewricht vraagt om verbinden.</li>
                            <li>Voor eenieder die de dienstverlening aan burgers wil verbeteren. Het huidige tijdsgewricht vraagt om transparantie en co-creatie.</li>
                            <li>Voor eenieder die beseft dat het wiel steeds opnieuw uitvinden minder doelmatig en minder slim is. Het huidige tijdsgewricht vraagt om delen.</li>
                            <li>Voor eenieder die direct aan de slag wil met zijn eigen netwerk, groep, website, sociaal intranet of sociaal extranet.</li>
                        </ul>
                    </div>

                    <div className="article__body">
                        <h2>Waar zetten zij Pleio voor in?</h2>
                        <p></p>
                        <ul className="disc">
                            <li>als online vergaderruimte</li>
                            <li>voor interbestuurlijke samenwerking</li>
                            <li>als sociaal intranet</li>
                            <li>als participatieplatform / online community</li>
                            <li>als burgerloket</li>
                            <li>voor wijkwebsites</li>
                            <li>voor vakspecialistische netwerken</li>
                            <li>als evenementensite</li>
                            <li>als opleidingscentrum</li>
                        </ul>
                        <p></p>
                        <p>Ontmoet, vind, ontdek, deel en vermenigvuldig.</p>
                    </div>
                </article>
            </main>
        );
    }
}