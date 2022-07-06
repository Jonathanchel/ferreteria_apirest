import React from 'react'
import { FlatList, Text, View } from 'react-native'


import { FlatListMenuItem } from '../components/FlatListMenuItem';
import { menuItems } from '../data/menuItems';
import { HeaderTitle } from '../components/HeaderTitle';
import { ItemSeparator } from '../components/ItemSeparator';

import { styles } from '../theme/appTheme';


export const HomeScreen = () => {

    return (
        <View style={{ flex: 1, ...styles.globalMargin }}>
           <Text>Home Screen</Text> 

            <FlatList 
                data={ menuItems }
                renderItem={ ({ item }) => <FlatListMenuItem menuItem={ item } /> }
                keyExtractor={ (item) => item.name }
                ListHeaderComponent={ () => <HeaderTitle title="Opciones de menú" />  }
                ItemSeparatorComponent={ () => <ItemSeparator /> }
            /> 
    
        </View>
    )
}
