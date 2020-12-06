export default {
    title: 'Atom/Button',
    argTypes: {
        title: { control: 'text' },
    },
}

//import { text } from '@storybook/addon-knobs'
import template from './index.twig'

export const Primary = args => template({ ...args })

Primary.args = {
    title: 'Test Button',
}
