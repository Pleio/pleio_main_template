import React from 'react'

export default class Help extends React.Component {
    render() {
        return (
            <main className="main" data-scroll-horizontal-target>
                <article className="article">
                    <div className="button ___round article__to-top" data-scroll-to-top=""></div>
                    <div className="article__header">
                        <div className="row">
                            <div className="col-lg-6">
                                <h1>Help</h1>
                            </div>
                            <div className="col-lg-6 center-xs">
                                <img className="article__image" src="/mod/pleio_main_template/assets/images/lamp.svg" />
                            </div>
                        </div>
                    </div>
                    <div className="article__body">
                        <p>Op Plein overheid helpen gebruikers elkaar. Dit gebeurt in groepen en via <a href="https://www.pleio.nl/groups/profile/3973/helpdesk-pleio">een (eigen) helpdesk</a>. Voor de beheerders van deelsites gebeurt dit op <a href="https://mijndeelsite.pleio.nl/">mijndeelsite</a>. Bovendien is er voor deelsitebeheerders elke maand een <a href="https://www.pleio.nl/workshoppleio">workshop Pleio beheer</a>. Beheerders van deelsites kunnen hun gebruikers een eigen Helpdesk aanbieden.</p>
                        <p>Of stel je vraag via:<br />
                        <a href="mailto:support@pleio.org">support@pleio.org</a> of het contactformulier.</p>
                   </div>
                </article>
            </main>
        )
    }
}