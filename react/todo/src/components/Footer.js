    import React from "react";
    import Box from '@mui/material/Box';
    import { styled } from '@mui/material/styles';

    const Footer = () => {
    return(
        <Box style={{
            width: "100%",
            height: 56,
            display: "flex",
            justifyContent: "center",
            alignItems: "center",
            color: "#FFF",
            backgroundColor: "#3f51b5",
            position: "fixed",
            bottom: 0,
            }}>  copyright nagamatsu</Box>
    )
    };
    export default Footer;


    // const useStyles = styled(() => ({
    //     root: {
    //         width: "100%",
    //         height: 56,
    //         display: "flex",
    //         justifyContent: "center",
    //         alignItems: "center",
    //         color: "#FFF",
    //         backgroundColor: "#3f51b5",
    //         position: "fixed",
    //         bottom: 0,
    //     },
    //     }));
    
    //     const Footer = () => {
    //     const classes = useStyles();
    //     return(
    //         <Box className={classes.root}>copyright nagamatsu</Box>
    //     )
    //     };
    //     export default Footer;