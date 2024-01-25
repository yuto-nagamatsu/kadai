import React,{useContext,useState} from "react";
import dig from 'object-dig';
import { signInWithGoogle ,logOut} from "../service/firebase";
import { AuthContext } from "../providers/AuthProvider";

import AppBar from '@mui/material/AppBar';
import Box from '@mui/material/Box';
import Toolbar from '@mui/material/Toolbar';
import Typography from '@mui/material/Typography';
import Button from '@mui/material/Button';
import IconButton from '@mui/material/IconButton';
import MenuIcon from '@mui/icons-material/Menu';


const Header = () =>{
    const currentUser = useContext(AuthContext);
    console.log(currentUser);
    //ログインした場合、していない場合でUIと挙動を変える
    const buttonRender = () =>{
        let buttonDom
        if(dig(currentUser,'currentUser','uid')){
            buttonDom =<Button variant="contained" color="secondary" onClick={logOut}>ログアウト</Button>
        }else{
            buttonDom =<Button variant="contained" color="primary" onClick={signInWithGoogle}>ログイン</Button>
        }
        return buttonDom
    }
    return(
        
        <header>
            <Box sx={{ flexGrow: 1 }}>
            <AppBar position="static">
                <Toolbar>
                <IconButton
                    size="large"
                    edge="start"
                    color="inherit"
                    aria-label="menu"
                    sx={{ mr: 2 }}
                >
                <MenuIcon />
                </IconButton>
                <Typography variant="h6" component="div" sx={{ flexGrow: 1 }}>
                    React-ToDoアプリ
                </Typography>
                {buttonRender()}
                </Toolbar>
            </AppBar>
            </Box>
        </header>
    )
}
export default Header;
