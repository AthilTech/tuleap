/**
 * Copyright (c) Enalean, 2018. All Rights Reserved.
 *
 * This file is a part of Tuleap.
 *
 * Tuleap is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * Tuleap is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Tuleap. If not, see <http://www.gnu.org/licenses/>.
 */

import moment                from 'moment';
import { createBurnupChart } from './burnup-chart-drawer.js';
import { gettext_provider }  from './gettext-provider.js';
import {
    gettext_provider as builders_gettext_provider
} from 'charts-builders/gettext-provider.js';

document.addEventListener('DOMContentLoaded', () => {
    const chart_container = document.getElementById('burnup-chart');

    if (! chart_container) {
        return;
    }

    const burnup_data     = JSON.parse(chart_container.dataset.burnup);
    const container_width = chart_container.clientWidth;
    const locale          = chart_container.dataset.locale;

    gettext_provider.setLocale(locale);
    builders_gettext_provider.setLocale(locale);

    moment.locale(locale);

    const chart_props = {
        graph_width        : container_width,
        graph_height       : container_width / 1.33,
        tooltip_date_format: gettext_provider.gettext('MM/DD'),
        margins: {
            top   : 100,
            right : 80,
            bottom: 60,
            left  : 80
        }
    };

    const chart_legends = {
        title  : gettext_provider.gettext('%s - Team effort'),
        bullets: [
            {
                label: gettext_provider.gettext('Ideal burnup'),
                classname: 'chart-plot-ideal-burnup'
            }, {
                label    : gettext_provider.gettext('Team effort'),
                classname: 'chart-plot-team-effort'
            }, {
                label    : gettext_provider.gettext('Total effort'),
                classname: 'chart-plot-total-effort'
            }
        ]
    };

    createBurnupChart({chart_container, chart_props, chart_legends, burnup_data});
});
